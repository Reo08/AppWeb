@extends('layout.PGeneral')

@section('titulo', 'Mis Cursos')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/area-personal.css">
    <script src="/app-web/resources/js/misCursos.js" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Mis Cursos')
    

@section('contenido')
    {{-- {{Auth::user()}} --}}
    <div class="buscar-curso">
        <h2>Mis cursos</h2>
        @if (Auth::user()->rol == "profesor")
            <p>Todos los cursos a supervisar.</p>
        @else
            <p>Todos los cursos en los que esta inscrito.</p>
        @endif
        <input type="search" name="" id="">
    </div>
    {{-- Aqui irian todos los cursos agregados --}}
    <div class="todos-cursos">
        @if (Auth::user()->rol == "profesor")
            @foreach ($cursos as $curso)
                <div class="cursoCard">
                    <div class="cursoCard-img1">
                        <a href="{{route('curso', $curso)}}">Ver</a>
                    </div>
                    <div class="cursoCard-info">
                        <h3>{{$curso->nombre_curso}}</h3>
                        @if (Auth::user()->admin == 1 || $cursos[0]->identificacion == Auth::user()->identificacion)
                            <p>Id: {{$curso->id_cursos}}</p>
                        @endif
                        <p>Descripcion: {{$curso->descripcion}}</p>
                        <p>Profesor: {{Auth::user()->nombre}}</p>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($cursosAlumnos as $cursoAlumno)
                <div class="cursoCard">
                    <div class="cursoCard-img1">
                        <a href="{{route('curso', ['curso' => $cursoAlumno])}}">Ver</a>
                    </div>
                    <div class="cursoCard-info">
                        <h3>{{$cursoAlumno->nombre_curso}}</h3>
                        <p>Descripcion: {{$cursoAlumno->descripcion}}</p>
                        <p>Profesor: {{$cursoAlumno->nombre}}</p>
                        <p>Estado: {{$cursoAlumno->estado == 1?'Activo':'Terminado'}}</p>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    @include('profesor.alerta.alerta')
@endsection