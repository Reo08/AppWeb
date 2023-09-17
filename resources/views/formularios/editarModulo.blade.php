@extends('layout.PGeneral')

@section('titulo', 'Editar Modulo')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/agregarModulo.css">
    <script src="/app-web/resources/js/vlidacionFormularios.js" defer type="module"></script>
    <script src="/app-web/resources/js/editarModulo.js" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Modulo')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Editar modulo {{$buscarModulo[0]->nombre_modulo}}</h2>
        <p>Aqui podra editar el modulo.</p>
    </div>
    <div class="cont-form-agregarModulo">
        <form class="form-agregarModulo" action="{{route('editando-modulo', ['curso'=> $buscarCurso[0],'modulo'=> $buscarModulo[0]])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label for="">Iframe del video de youtube</label>
            <input type="text" name="url_youtube" value="{{$buscarModulo[0]->url_youtube}}">
            @error('url_youtube')
                <small>*{{$message}}</small>
            @enderror
            <label>Descripcion del modulo</label>
            <textarea name="desc_modulo" cols="30" rows="10" required title="Maximo 255 caracteres" data-pattern="^.{0,255}$">{{$buscarModulo[0]->desc_modulo}}</textarea>
            <small class="smallArea none">Maximo 255 caracteres</small>
            @error('desc_modulo')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Editar</button>
                <a href="{{route('modulo',['curso' => $buscarCurso[0],'modulo'=> $buscarModulo[0]])}}">Cancelar</a>
            </div>
        </form>
    </div>
    @include('profesor.alerta.alerta')
@endsection