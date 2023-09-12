@extends('layout.PModulo')

@section('titulo', 'Modulo')
    
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/modulo.css">
    <link rel="stylesheet" href="/app-web/resources/css/test.css">
    <script src="/app-web/resources/js/test.js" defer type="module"></script>
@endsection

@section('contenido')
    <div class="cont-titulo-modulo">
        <h1>Test de {{$buscarTest[0]->nombre_test}}</h1>
        @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
        <p>Id: {{$buscarTest[0]->id_test}}</p>
        <div>
            <form class="formBtnEliminarModulo" action="{{route('eliminando-test', ["curso" => $buscarCurso[0], "test" => $buscarTest[0]])}}" method="POST"> @csrf @method('delete') <button>Eliminar Test</button></form>
        </div>
        @endif
    </div>
    <div class="cont-preguntas">
        <form action="{{route('enviando-respuestas-test',["curso" =>$buscarCurso[0],"modulo"=>$buscarModulo[0], "test"=> $buscarTest[0]])}}" method="POST">
            @csrf
            <ol>
                <li>
                    <p>{{$preguntasTest[0]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P1opcion" value="{{$preguntasTest[0]->respuesta_uno}}"> <p>{{$preguntasTest[0]->respuesta_uno}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P1opcion" value="{{$preguntasTest[0]->respuesta_dos}}"> <p>{{$preguntasTest[0]->respuesta_dos}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P1opcion" value="{{$preguntasTest[0]->respuesta_tres}}"> <p>{{$preguntasTest[0]->respuesta_tres}}</p>
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[1]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P2opcion" value="{{$preguntasTest[1]->respuesta_uno}}"> <p>{{$preguntasTest[1]->respuesta_uno}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P2opcion" value="{{$preguntasTest[1]->respuesta_dos}}"> <p>{{$preguntasTest[1]->respuesta_dos}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P2opcion" value="{{$preguntasTest[1]->respuesta_tres}}"> <p>{{$preguntasTest[1]->respuesta_tres}}</p>
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[2]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P3opcion" value="{{$preguntasTest[2]->respuesta_uno}}"> <p>{{$preguntasTest[2]->respuesta_uno}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P3opcion" value="{{$preguntasTest[2]->respuesta_dos}}"> <p>{{$preguntasTest[2]->respuesta_dos}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P3opcion" value="{{$preguntasTest[2]->respuesta_tres}}"> <p>{{$preguntasTest[2]->respuesta_tres}}</p>
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[3]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P4opcion" value="{{$preguntasTest[3]->respuesta_uno}}"> <p>{{$preguntasTest[3]->respuesta_uno}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P4opcion" value="{{$preguntasTest[3]->respuesta_dos}}"> <p>{{$preguntasTest[3]->respuesta_dos}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P4opcion" value="{{$preguntasTest[3]->respuesta_tres}}"> <p>{{$preguntasTest[3]->respuesta_tres}}</p>
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[4]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P5opcion" value="{{$preguntasTest[4]->respuesta_uno}}"> <p>{{$preguntasTest[4]->respuesta_uno}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P5opcion" value="{{$preguntasTest[4]->respuesta_dos}}"> <p>{{$preguntasTest[4]->respuesta_dos}}</p>
                    </div>
                    <div>
                        <input type="radio" required name="P5opcion" value="{{$preguntasTest[4]->respuesta_tres}}"> <p>{{$preguntasTest[4]->respuesta_tres}}</p>
                    </div>
                </li>
            </ol>
            @if ($preguntasTest[0]->pregunta !== "Sin pregunta")
                <div>
                    <button>Enviar</button>
                </div>
            @endif
        </form>
    </div>
@endsection