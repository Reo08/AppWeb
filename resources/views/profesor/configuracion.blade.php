@extends('layout.PGeneral')

@section('titulo', 'Configuracion')
@section('cssJs')
    <link rel="stylesheet" href="{{aset('css/configuracion.css')}}">
    <script src="{{asset('js/configuracion.js')}}" defer></script>
@endsection
    
@section('titulo-encabezado', 'Configuraciones')
    

@section('contenido')
    <div class="cont-desc">
        <h2>{{Auth::user()->nombre}}</h2>
    </div>
    <div class="cont-configuraciones">
        <h3>Cuenta de usuario</h3>
        <ul>
            <li><a href="{{route('area-personal.perfil')}}">Editar perfil</a></li>
            <li> <a href="{{route('cambiar-contrasena')}}">Cambiar contraseña</a></li>
            <li><a class="eliminar-cuenta" href="{{route('eliminando-cuenta-propia')}}">Eliminar mi cuenta</a></li>
        </ul>
    </div>
    @include('profesor.alerta.alerta')
@endsection