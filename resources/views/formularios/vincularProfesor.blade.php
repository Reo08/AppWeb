@extends('layout.PGeneral')

@section('titulo', 'Administrar')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/administrar.css">
@endsection
    
@section('titulo-encabezado', 'Administrar')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Vincular profesor</h2>
        <p>Aqui podra vincular a un profesor a un curso.</p>
    </div>
    <div class="cont-form-vincularProfesor">
        <form class="form-vincularProfesor" action="{{route('vinculando-profesor')}}" method="POST">
            @csrf
            @method('put')
            <label>Cedula</label>
            <input type="text" name="identificacion" title="Solo numeros" pattern="^[0-9]+$" required value={{old('identificacion')}}>
            @error('identificacion')
                <small>*{{$message}}</small>
            @enderror
            <label>Id del curso</label>
            <input type="text" name="id_cursos" value="{{old('id_cursos')}}" title="Solo numeros y sin espacios" pattern="^\d+$" required>
            @error('id_cursos')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Agregar</button>
                <a href="{{route('administrar')}}">Cancelar</a>
            </div>
        </form>
    </div>
    @include('profesor.alerta.alerta')
@endsection