@extends('layout.PGeneral')

@section('titulo', 'Area Personal')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/area-personal.css">
    <script src="/app-web/resources/js/filtroCursos.js" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Area personal')
    

@section('contenido')
    {{-- {{Auth::user()}} --}}
    <div class="buscar-curso">
        <h2>Cursos</h2>
        <p>Todos los cursos agregados</p>
        <input type="search" class="buscar">
    </div>
    {{-- Aqui irian todos los cursos agregados --}}
    <div class="todos-cursos">
        @foreach ($cursos as $curso)
            <div class="cursoCard">
                <div class="cursoCard-img">
                    <a href="{{route('curso', $curso)}}">Ver</a>
                </div>
                <div class="cursoCard-info">
                    <h3>{{$curso->nombre_curso}}</h3>
                    <p>id: {{$curso->id_cursos}}</p>
                    <p>Descripcion: {{$curso->descripcion}}</p>
                    <p>Profesor: {{$curso->nombre}}</p>
                </div>
            </div>
        @endforeach
    </div>
    @include('profesor.alerta.alerta')
@endsection