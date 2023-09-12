@extends('layout.PGeneral')

@section('titulo', 'Curso')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/curso.css">
    <script src="/app-web/resources/js/formTest.js" defer type="module"></script>
@endsection
    
@section('titulo-encabezado', 'Curso - Crear test')
    

@section('contenido')
    <div class="info-test">
        <h2>Agregar Test</h2>
        <p>Aqui podra crear el test para el curso.</p>
    </div>
    <div class="cont-form-test">
        <form action="{{route('creando-test',['curso'=> $buscarCurso[0],'test'=> $buscarTest[0]->id_test])}}" method="POST">
            @csrf
            <div class="nombre-test">
                <div>
                    <button>Crear test</button>
                    <a href="{{route('curso', ['curso' => $buscarCurso[0]])}}">Cancelar</a>
                </div>
            </div>
            <div class="preguntas">
                <label for="">Pregunta 1</label>
                <input type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required data-pregunta name="preguntaUno">
                @error('preguntaUno')
                    <small>*{{$message}}</small>
                @enderror
                <label class="label" for="">Respuestas</label>
                <div class="cont-respuestas">
                    <div>
                        <input type="radio" required name="PCorrectaUno" class="sync-value" data-checkuno="false" value="" id=""><input class="sync-value" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P1RespuestaUno" placeholder="Respuesta 1">
                    </div>
                    @error('P1RespuestaUno')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaUno" class="sync-value" data-checkuno="false" value="" id=""><input class="sync-value" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P1RespuestaDos" placeholder="Respuesta 2">
                    </div>
                    @error('P1RespuestaDos')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaUno" class="sync-value" data-checkuno="false" value="" id=""><input class="sync-value" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P1RespuestaTres" placeholder="Respuesta 3">
                    </div>
                    @error('P1RespuestaTres')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="preguntas">
                <label for="">Pregunta 2</label>
                <input type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required data-pregunta name="preguntaDos">
                @error('preguntaDos')
                    <small>*{{$message}}</small>
                @enderror
                <label class="label" for="">Respuestas</label>
                <div class="cont-respuestas">
                    <div>
                        <input type="radio" required name="PCorrectaDos" class="radio2" id=""><input class="radio2" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P2RespuestaUno" placeholder="Respuesta 1">
                    </div>
                    @error('P2RespuestaUno')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaDos" class="radio2" id=""><input class="radio2" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P2RespuestaDos"  placeholder="Respuesta 2">
                    </div>
                    @error('P2RespuestaDos')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaDos" class="radio2" id=""><input class="radio2" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P2RespuestaTres" placeholder="Respuesta 3">
                    </div>
                    @error('P2RespuestaTres')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="preguntas">
                <label for="">Pregunta 3</label>
                <input type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required data-pregunta name="preguntaTres">
                @error('preguntaTres')
                    <small>*{{$message}}</small>
                @enderror
                <label class="label" for="">Respuestas</label>
                <div class="cont-respuestas">
                    <div>
                        <input type="radio" required name="PCorrectaTres" class="radio3" id=""><input class="radio3" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P3RespuestaUno" placeholder="Respuesta 1">
                    </div>
                    @error('P3RespuestaUno')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaTres" class="radio3" id=""><input class="radio3" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P3RespuestaDos" placeholder="Respuesta 2">
                    </div>
                    @error('P3RespuestaDos')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaTres" class="radio3" id=""><input class="radio3" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P3RespuestaTres" placeholder="Respuesta 3">
                    </div>
                    @error('P3RespuestaTres')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="preguntas">
                <label for="">Pregunta 4</label>
                <input type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required data-pregunta name="preguntaCuatro">
                @error('preguntaCuatro')
                    <small>*{{$message}}</small>
                @enderror
                <label class="label" for="">Respuestas</label>
                <div class="cont-respuestas">
                    <div>
                        <input type="radio" required name="PCorrectaCuatro" class="radio4" id=""><input class="radio4" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P4RespuestaUno" placeholder="Respuesta 1">
                    </div>
                    @error('P4RespuestaUno')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaCuatro" class="radio4" id=""><input class="radio4" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P4RespuestaDos" placeholder="Respuesta 2">
                    </div>
                    @error('P4RespuestaDos')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaCuatro" class="radio4" id=""><input class="radio4" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P4RespuestaTres" placeholder="Respuesta 3">
                    </div>
                    @error('P4RespuestaTres')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="preguntas">
                <label for="">Pregunta 5</label>
                <input type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required data-pregunta name="preguntaCinco">          
                @error('preguntaCinco')
                    <small>*{{$message}}</small>
                @enderror
                <label class="label" for="">Respuestas</label>
                <div class="cont-respuestas">
                    <div>
                        <input type="radio" required name="PCorrectaCinco" class="radio5" id=""><input class="radio5" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P5RespuestaUno" placeholder="Respuesta 1">
                    </div>
                    @error('P5RespuestaUno')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaCinco" class="radio5" id=""><input class="radio5" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P5RespuestaDos" placeholder="Respuesta 2">
                    </div>
                    @error('P5RespuestaDos')
                        <small>*{{$message}}</small>
                    @enderror
                    <div>
                        <input type="radio" required name="PCorrectaCinco" class="radio5" id=""><input class="radio5" type="text" pattern="^.{0,250}$" tittle="Maximo 250 caracteres" required name="P5RespuestaTres" placeholder="Respuesta 3">
                    </div>
                    @error('P5RespuestaTres')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
            </div>
        </form>
    </div>
    @include('profesor.alerta.alerta')
@endsection