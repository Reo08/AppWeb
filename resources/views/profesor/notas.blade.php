@extends('layout.PGeneral')

@section('titulo', 'Notas')
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/notas.css">
@endsection
    
@section('titulo-encabezado', 'Notas')
    

@section('contenido')
    <div class="cont-notas">
        <ul>
            <li>
                <a href="">
                    <h3>Nombre del curso</h3>
                    <p>id: 1</p>
                </a>
            </li>
            <li>
                <a href="">
                    <h3>Nombre del curso</h3>
                    <p>id: 1</p>
                </a>
            </li>
            <li>
                <a href="">
                    <h3>Nombre del curso</h3>
                    <p>id: 1</p>
                </a>
            </li>
        </ul>
    </div>
@endsection