@extends('layout.PGeneral')

@section('titulo', 'Cuentas')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/cuentas.css">
@endsection
    
@section('titulo-encabezado', 'Cuentas')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Agregar profesor</h2>
        <p>Aqui podra agregar una cuenta de profesor</p>
    </div>
    <div class="cont-form-aggProfe">
        <form action="{{route('agregando-profesor')}}" method="POST">
            @csrf
            <label for="">Administrador</label>
            <select name="admin" id="">
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{old('nombre')}}" required title="Solo se permiten letras y espacios, con un máximo de 30 caracteres" pattern="[A-Za-z\s]{1,35}">
            @error('nombre')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Correo</label>
            <input type="email" name="correo" value="{{old('correo')}}" required title="Email incorrecto" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
            @error('correo')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Contraseña</label>
            <input type="password" name="contrasena" value="{{old('contrasena')}}" required title="Debe contener almenos un caracter en mayuscula, un numero y una longitud entre 8 y 16 caracteres" pattern='^(?=.*[A-Z])(?=.*\d).{8,16}$'>
            @error('contrasena')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Cedula</label>
            <input type="text" name="identificacion" title="Solo numeros, sin espacios y maximo 20 digitos" pattern="^\d{1,20}$" required value={{old('identificacion')}}>
            @error('identificacion')
                <small>*{{$message}}</small>
            @enderror
            <input type="hidden" name="rol" value="profesor">
            <div>
                <button>Registrar</button>
                <a href="{{route('area-personal.cuentas')}}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection