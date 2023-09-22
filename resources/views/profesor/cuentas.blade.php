@extends('layout.PGeneral')

@section('titulo', 'Cuentas')
@section('cssJs')
    <link rel="stylesheet" href="{{route('css/cuentas.css')}}">
@endsection
    
@section('titulo-encabezado', 'Cuentas')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Cuentas</h2>
        <p>Bienvenido a la seccion de Cuentas.</p>
    </div>
    <div class="cont-a-vinculos">
        <ul>
            <li><a href="{{route('area-personal.cuentas.agregarProfesor')}}">Agregar profesor</a></li>
            <li> <a href="{{route('area-personal.cuentas.agregarAlumno')}}">Agregar alumno</a></li>
            <li><a href="{{route('area-personal.cuentas.eliminarCuenta')}}">Eliminar cuenta</a></li>
        </ul>
    </div>
    @include('profesor.alerta.alerta')
@endsection