@extends('layout.PGeneral')

@section('titulo', 'Administrar')
@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/administrar.css')}}">
@endsection
    
@section('titulo-encabezado', 'Administrar')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Eliminar inscripcion</h2>
        <p>Aqui podra eliminar la inscripcion del alumno.</p>
    </div>
    <div class="cont-form-vincularProfesor">
        <form class="form-vincularProfesor" action="{{route('eliminandoInscripcion')}}" method="POST">
            @csrf
            @method('delete')
            <label>Identificacion</label>
            <input type="text" name="identificacion" title="Solo numeros" pattern="^[0-9]+$" required value="{{old('identificacion')}}">
            @error('identificacion')
                <small>*{{$message}}</small>
            @enderror
            <label>Id del curso</label>
            <input type="text" name="id_curso" title="Solo numeros y sin espacios" required pattern="^\d+$" value="{{old('id_curso')}}">
            @error('id_curso')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Eliminar</button>
                <a href="{{route('administrar')}}">Cancelar</a>
            </div>
        </form>
    </div>
    @include('profesor.alerta.alerta')
@endsection