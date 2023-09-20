@extends('layout.PGeneral')

@section('titulo', 'Curso')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/curso.css">
    <script src="/app-web/resources/js/eliminarCurso.js" defer></script>
    <script src="/app-web/resources/js/curso.js" defer></script>
@endsection
    
@section('titulo-encabezado', 'Curso')
    

@section('contenido')
    <div class="info-curso">
        <h2>{{$buscarCurso[0]->nombre_curso}}</h2>
        @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
            <p>ID: {{$buscarCurso[0]->id_cursos}}</p>
            <p>Cantidad de alumnos: {{$cantidadAlumnos}}</p>
        @endif
        <p>Descripcion: {{$buscarCurso[0]->descripcion}}</p>
        @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
        <div>
            <a href="{{route('area-personal.editarCurso', $buscarCurso[0])}}">Editar curso</a>
            <form class="form-eliminar" action="{{route('eliminando-curso', $buscarCurso[0])}}" method="POST"> @csrf @method('delete') <button>Eliminar este curso</button></form>
        </div>
        @endif
    </div>
    <div class="modulos-de-curso">
        <div>
            <h2>Cantidad de modulos</h2>
            @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
                <div class="cont-agg-test">
                    <a href="{{route('agregar-modulo',['curso'=>$buscarCurso[0]])}}">Agregar modulo</a>
                    @if (count($buscarTest)>0)
                        <a href="{{route('curso.crear-test', ['curso' =>$buscarCurso[0]])}}" title="Ya existe un formulario" class="deshabilitado">Agregar test</a>
                    @else
                        <a href="{{route('curso.crear-test', ['curso' =>$buscarCurso[0]])}}" title="Solo un formulario">Agregar test</a>
                    @endif
                </div>
            @endif
        </div>
        @foreach ($buscarModulos as $modulo)
            <a class="modulo" href="{{route('modulo',['curso' =>$buscarCurso[0], 'modulo'=> $modulo])}}">
                <p>Titulo modulo: {{$modulo->nombre_modulo}}</p>
                @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
                    <p>ID: {{$modulo->id_modulos}}</p>
                @endif
            </a>
        @endforeach
        @if (count($buscarTest) > 0 && ($inscripcionAlumno[0]->identificacion == Auth::user()->identificacion || Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion))
            <a class="modulo" href="{{route('test',['curso'=> $buscarCurso[0],'modulo'=> $modulo,'test' => $buscarTest[0]])}}">
                <p>Test</p>
                @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
                    <p>ID: {{$buscarTest[0]->id_test}}</p>
                @endif
            </a>
        @endif
    </div>
    @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
    <div class="alumnos-inscritos">
        <h2>Alumnos del curso</h2>
        <div class="cont-buscar-alumno">
            <input type="search" name="buscarAluumno" class="buscarAlumno">
            <div>
                <label for="filtrar_nombre">
                    <input type="radio" name="filtro" id="filtrar_nombre" checked value="nombre"> filtrar por nombre
                </label>
                <label for="filtrar_id">
                    <input type="radio" name="filtro" id="filtrar_id" value="identificacion"> filtrar por identificacion
                </label>
            </div>
        </div>
        <div class="tabla-alumnos">
            <table>
                <thead>
                    <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscripciones as $inscripcion)
                        <tr class="fila">
                            <td class="fila-id">{{$inscripcion->identificacion}}</td>
                            <td class="fila-nombre">{{$inscripcion->nombre_alumno}}</td>
                            <td>{{$inscripcion->correo}}</td>
                            <td>{{$inscripcion->estado == 1 ? "Activo": "Terminado"}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @include('profesor.alerta.alerta')
@endsection