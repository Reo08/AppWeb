@extends('layout.PGeneral')

@section('titulo', 'Notas')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/notas.css">
@endsection
    
@section('titulo-encabezado', 'Notas')
    

@section('contenido')
    <div class="cont-info-notas">
        <h2>Notas</h2>
        <p>Seccion para ver el resultdo de los test de los alumnos de los cursos supervisados.</p>
    </div>
    <div class="cont-notas">
        <ul>
            @if (Auth::user()->rol == "profesor")
                @if (Auth::user()->admin == 1)
                    @foreach ($todosLosCursos as $curso)
                        <li>
                            <a href="{{route('nota-de-curso',$curso)}}">
                                <h3>{{$curso->nombre_curso}}</h3>
                                <p>ID: {{$curso->id_cursos}}</p>
                            </a>
                        </li>
                    @endforeach
                @else
                    @foreach ($cursos as $curso)
                        <li>
                            <a href="{{route('nota-de-curso',$curso)}}">
                                <h3>{{$curso->nombre_curso}}</h3>
                                <p>ID: {{$curso->id_cursos}}</p>
                            </a>
                        </li>
                    @endforeach
                @endif
            @else
                @foreach ($cursosAlumnos as $curso)
                    <li>
                        <a href="{{route('nota-de-curso',$curso)}}">
                            <h3>{{$curso->nombre_curso}}</h3>
                            <p>ID: {{$curso->id_cursos}}</p>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endsection