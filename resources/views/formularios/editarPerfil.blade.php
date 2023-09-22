@extends('layout.PGeneral')

@section('titulo', 'Perfil')
@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/editarPerfil.css')}}">
@endsection
    
@section('titulo-encabezado', 'Perfil')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Editar perfil</h2>
        <p>Espacio para editar los datos del perfil</p>
    </div>
    <div class="cont-form-editarPerfil">
        <form action="{{route('editando-perfil')}}" method="POST">
            @csrf
            @method('put')
            <label for="">Nombre</label>
            <input type="text" name="nombre" required value="{{Auth::user()->nombre}}">
            @error('nombre')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Telefono</label>
            <input type="text" name="telefono" value="{{$infoUsuario->telefono}}" title="Solo numeros y un maximo de 13 digitos" pattern="^\d{1,13}$">
            @error('telefono')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Celular</label>
            <input type="text" name="celular" value="{{$infoUsuario->celular}}" title="Solo numeros y un maximo de 13 digitos" pattern="^\d{1,13}$">
            @error('celular')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Editar</button>
                <a href="{{route('area-personal.perfil')}}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection