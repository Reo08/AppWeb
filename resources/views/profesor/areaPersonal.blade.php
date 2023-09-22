@extends('layout.PGeneral')

@section('titulo', 'Area Personal')
@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/area-personal.css')}}">
    <script src="{{asset('js/filtroCursos.js')}}" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Area personal')
    

@section('contenido')
    {{-- {{Auth::user()}} --}}
    <div class="buscar-curso">
        <h2>Cursos</h2>
        <p>Todos los cursos agregados</p>
        <input type="search" class="buscar" placeholder="Nombre del curso">
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
                    @if (Auth::user()->admin == 1 || $cursos[0]->id_usuarios == Auth::user()->identificacion)
                        <p>id: {{$curso->id_cursos}}</p>
                    @endif
                    <p class="descripcion-curso">Descripcion: {{$curso->descripcion}}</p>
                    <p>Profesor: {{$curso->nombre}}</p>
                </div>
            </div>
        @endforeach
    </div>
    @include('profesor.alerta.alerta')
@endsection