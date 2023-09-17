@extends('layout.PGeneral')

@section('titulo', 'Agregar Modulo')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/agregarModulo.css">
    <script src="/app-web/resources/js/vlidacionFormularios.js" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Curso')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Agregar modulo</h2>
        <p>Aqui podra agregar un modulo.</p>
    </div>
    <div class="cont-form-agregarModulo">
        <form class="form-agregarModulo" action="{{route('agregando-modulo',$curso)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Nombre del modulo</label>
            <input type="text" name="nombre_modulo"  required title="Solo letras, numeros y un maximo de 70 caracteres" pattern="^[A-Za-z0-9\s]{1,70}$" value={{old('nombre_modulo')}}>
            @error('nombre_modulo')
                <small>*{{$message}}</small>
            @enderror
            <label for="">Iframe del video de youtube</label>
            <input type="text" name="url_youtube">
            @error('url_youtube')
                <small>*{{$message}}</small>
            @enderror
            <label>Descripcion del modulo</label>
            <textarea name="desc_modulo" cols="30" rows="10" required title="Maximo 255 caracteres" data-pattern="[\w\s\d!@#$%^&*()_+{}\[\]:;<>,.?~\\-]{1,255}">{{old('desc_modulo')}}</textarea>
            <small class="smallArea none">Maximo 255 caracteres</small>
            @error('desc_modulo')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Agregar</button>
                <a href="{{route('curso',$curso)}}">Cancelar</a>
            </div>
        </form>
    </div>
    @include('profesor.alerta.alerta')
@endsection