@extends('layout.PGeneral')

@section('titulo', 'Administrar')
@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/administrar.css')}}">
@endsection
    
@section('titulo-encabezado', 'Administrar')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Administrar</h2>
        <p>Bienvenido a la seccion de Administrar.</p>
    </div>
    <div class="cont-a-vinculos">
        <ul>
            <li><a href="{{route('administrar.crear-curso')}}">Crear curso</a></li>
            @if (Auth::user()->admin == 1)
                <li> <a href="{{route('administrar.vincular-profesor')}}">Vincular profesor</a></li>
                <li><a href="{{route('administrar.desvincular-profesor')}}">Desvincular profesor</a></li>  
            @endif
            <li><a href="{{route('administrar.inscribirAlumno')}}">Inscribir alumno a un curso</a></li>
            <li><a href="{{route('administrar.eliminarInscripcion')}}">Eliminar inscripcion de alumno</a></li>
        </ul>
    </div>
    @include('profesor.alerta.alerta')
@endsection