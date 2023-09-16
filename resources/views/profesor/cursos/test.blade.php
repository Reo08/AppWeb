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
        @if ($buscarNotas[0]->test_enviado == 0 || Auth::user()->rol == "profesor")
        <form action="{{route('enviando-respuestas-test',["curso" =>$buscarCurso[0],"modulo"=>$buscarModulo[0], "test"=> $buscarTest[0]])}}" method="POST">
            @csrf
            <ol>
                <li>
                    <p>{{$preguntasTest[0]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P1opcion" value="{{$preguntasTest[0]->respuesta_uno}}"> <p>{{$preguntasTest[0]->respuesta_uno}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[0]->respuesta_uno == $preguntasTest[0]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P1opcion" value="{{$preguntasTest[0]->respuesta_dos}}"> <p>{{$preguntasTest[0]->respuesta_dos}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[0]->respuesta_dos == $preguntasTest[0]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P1opcion" value="{{$preguntasTest[0]->respuesta_tres}}"> <p>{{$preguntasTest[0]->respuesta_tres}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[0]->respuesta_tres == $preguntasTest[0]->correcta) <small>✅</small> @endif
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[1]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P2opcion" value="{{$preguntasTest[1]->respuesta_uno}}"> <p>{{$preguntasTest[1]->respuesta_uno}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[1]->respuesta_uno == $preguntasTest[1]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P2opcion" value="{{$preguntasTest[1]->respuesta_dos}}"> <p>{{$preguntasTest[1]->respuesta_dos}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[1]->respuesta_dos == $preguntasTest[1]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P2opcion" value="{{$preguntasTest[1]->respuesta_tres}}"> <p>{{$preguntasTest[1]->respuesta_tres}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[1]->respuesta_tres == $preguntasTest[1]->correcta) <small>✅</small> @endif
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[2]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P3opcion" value="{{$preguntasTest[2]->respuesta_uno}}"> <p>{{$preguntasTest[2]->respuesta_uno}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[2]->respuesta_uno == $preguntasTest[2]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P3opcion" value="{{$preguntasTest[2]->respuesta_dos}}"> <p>{{$preguntasTest[2]->respuesta_dos}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[2]->respuesta_dos == $preguntasTest[2]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P3opcion" value="{{$preguntasTest[2]->respuesta_tres}}"> <p>{{$preguntasTest[2]->respuesta_tres}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[2]->respuesta_tres == $preguntasTest[2]->correcta) <small>✅</small> @endif
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[3]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P4opcion" value="{{$preguntasTest[3]->respuesta_uno}}"> <p>{{$preguntasTest[3]->respuesta_uno}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[3]->respuesta_uno == $preguntasTest[3]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P4opcion" value="{{$preguntasTest[3]->respuesta_dos}}"> <p>{{$preguntasTest[3]->respuesta_dos}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[3]->respuesta_dos == $preguntasTest[3]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P4opcion" value="{{$preguntasTest[3]->respuesta_tres}}"> <p>{{$preguntasTest[3]->respuesta_tres}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[3]->respuesta_tres == $preguntasTest[3]->correcta) <small>✅</small> @endif
                    </div>
                </li>
                <li>
                    <p>{{$preguntasTest[4]->pregunta}}</p>
                    <div>
                        <input type="radio" required name="P5opcion" value="{{$preguntasTest[4]->respuesta_uno}}"> <p>{{$preguntasTest[4]->respuesta_uno}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[4]->respuesta_uno == $preguntasTest[4]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P5opcion" value="{{$preguntasTest[4]->respuesta_dos}}"> <p>{{$preguntasTest[4]->respuesta_dos}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[4]->respuesta_dos == $preguntasTest[4]->correcta) <small>✅</small> @endif
                    </div>
                    <div>
                        <input type="radio" required name="P5opcion" value="{{$preguntasTest[4]->respuesta_tres}}"> <p>{{$preguntasTest[4]->respuesta_tres}}</p> @if (Auth::user()->rol == "profesor" && $preguntasTest[4]->respuesta_tres == $preguntasTest[4]->correcta) <small>✅</small> @endif
                    </div>
                </li>
            </ol>
            @if ($preguntasTest[0]->pregunta !== "Sin pregunta" && Auth::user()->rol == "alumno")
                <div>
                    <button>Enviar</button>
                </div>
            @endif
        </form>
        @else
            <div class="test-realizado">
                <h2>¡El test ya lo ha realizado!</h2>
                <p>Dirigase a la seccion de notas para ver la calificacion de este curso.</p>
                <a href="{{route('area-personal.notas')}}">Ver notas</a>
            </div>
        @endif
    </div>
@endsection