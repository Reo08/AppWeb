@extends('layout.PGeneral')

@section('titulo', 'Administrar')
@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/notas.css')}}">
    <script src="{{asset('js/notaDeCurso.js')}}" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Notas')
    

@section('contenido')
    <div class="cont-desc">
        <h2>{{$buscarCurso[0]->nombre_curso}}</h2>
    </div>
    <div class="cont-notas-alumno">
        @if (Auth::user()->rol == "profesor")
            <p>Alguna descripcion o algo</p>
        @else
            <h2>Calificacion</h2>
        @endif
        @if (Auth::user()->rol == "profesor")
            <div class="cont-buscarNota">
                <input type="search" name="buscarNotas" class="buscarNota">
                <div>
                    <label for="filtrar_nombre">
                        <input type="radio" name="filtrar" id="filtrar_nombre" checked value="nombre"> filtrar por nombre
                    </label>
                    <label for="filtrar_identificacion">
                        <input type="radio" name="filtrar" id="filtrar_identificacion" value="identificacion"> filtrar por identificacion
                    </label>
                </div>
            </div>
            <div class="cont-tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notasAlumnos as $nota)
                            <tr class="fila">
                                <td class="fila-id">{{$nota->identificacion}}</td>
                                <td class="fila-nombre">{{$nota->nombre}}</td>
                                <td>{{$nota->nota}}/5</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            @if (count($notaIndividual) > 0)
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Nombre del curso</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{route('curso', $buscarCurso[0])}}">{{$buscarCurso[0]->nombre_curso}}</a></td>
                            <td>{{$notaIndividual[0]->nota}}/5</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <div class="notaVacia">
                    <h2>No tienes nota</h2>
                    <p>Realiza el test para poder ver el resultado.</p>
                    <a href="{{route('curso', $buscarCurso[0])}}">Ir al curso</a>
                </div>
            @endif
        @endif
    </div>
    @include('profesor.alerta.alerta')
@endsection