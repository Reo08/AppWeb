@extends('layout.PGeneral')

@section('titulo', 'Editar Curso')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/administrar.css">
    <script src="/app-web/resources/js/editarCurso.js" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Administrar')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Editar Curso {{$buscarCurso[0]->nombre_curso}}</h2>
        <p>Aqui podra editar el curso.</p>
    </div>
    <div class="cont-form-crearCurso">
        <form class="form-crearCurso" action="{{route('editando-curso', $buscarCurso[0])}}" method="POST">
            @csrf
            @method('put')
            <label>Nombre del curso</label>
            <input data-input type="text" name="nombre_curso" value="{{$buscarCurso[0]->nombre_curso}}" required title="Solo letras, numeros y un maximo de 100 caracteres" pattern="^[a-zA-Z0-9\s]{1,100}$">
            @error('nombre_curso')
                <small>*{{$message}}</small>
            @enderror
            <label>Descripcion del curso</label>
            <textarea data-input name="descripcion" cols="30" rows="10" required title="Maximo 255 caracteres" data-pattern="^.{0,255}$"> {{$buscarCurso[0]->descripcion}}</textarea>
            <small class="smallArea none">Maximo 255 caracteres</small>
            @error('descripcion')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Editar</button>
                <a href="{{route('curso', $buscarCurso[0])}}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection