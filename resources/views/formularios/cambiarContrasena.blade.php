@extends('layout.PGeneral')

@section('titulo', 'Cambiar contraseña')

@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/cambiarContrasena.css')}}">
    <script src="{{asset('js/cambiarContrasena.js')}}" defer></script>
@endsection

@section('titulo-encabezado', 'Configuraciones')


@section('contenido')
    <div class="cont-nombre-user">
        <h2>Cambiar contraseña</h2>
    </div>
    <div class="cont-form-cambiar-contrasena">
        <form class="formCambioContrasena" action="{{route('cambiando-contrasena')}}" method="POST">
            @csrf
            @method('put')
            <label for="">Contraseña actual</label>
            <input type="password" name="contrasena" required>
            @error('contrasena')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Contraseña nueva</label>
            <input type="password" name="contrasena_nueva" title="Debe contener almenos un caracter en mayuscula, un numero y una longitud entre 8 y 16 caracteres" pattern="^(?=.*[A-Z])(?=.*\d).{8,16}$" required>
            @error('contrasena_nueva')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Confirmar contraseña</label>
            <input type="password" name="contrasena_nueva2">
            <small class="small none">Contraseñas no coinciden</small>
            <div>
                <button>Cambiar</button>
                <a href="{{route('area-personal.configuracion')}}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection