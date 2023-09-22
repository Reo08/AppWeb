@extends('layout.PGeneral')

@section('titulo', 'Administrar')
@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/administrar.css')}}">
    <script src="{{asset('js/crearCurso.js')}}" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Administrar')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Crear curso</h2>
        <p>Aqui podra crear un curso.</p>
    </div>
    <div class="cont-form-crearCurso">
        <form class="form-crearCurso" action="{{route('creando-curso')}}" method="POST">
            @csrf
            <label>Nombre del curso</label>
            <input type="text" name="nombre_curso" value="{{old('nombre_curso')}}" required title="Solo letras, numeros y un maximo de 100 caracteres" pattern="^.{0,100}$">
            @error('nombre_curso')
                <small>*{{$message}}</small>
            @enderror
            <label>Descripcion del curso</label>
            <textarea name="descripcion" cols="30" rows="10" required title="Maximo 255 caracteres" data-pattern="^.{0,255}$">{{old('descripcion')}}</textarea>
            <small class="smallArea none">Maximo 255 caracteres</small>
            @error('descripcion')
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