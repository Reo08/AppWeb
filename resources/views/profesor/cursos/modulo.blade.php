@extends('layout.PModulo')

@section('titulo', 'Modulo')
    
@section('cssJs')
    <link rel="stylesheet" href="/app-web/resources/css/modulo.css">
    <script src="/app-web/resources/js/modulo.js" defer></script>
@endsection

@section('video')
    <video src="{{$buscarModulo[0]->url_video}}" controls></video>
@endsection

@section('contenido')
    <div class="cont-titulo-modulo">
        <h1>{{$buscarModulo[0]->nombre_modulo}}</h1>
        @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
        <p>Id: {{$buscarModulo[0]->id_modulos}}</p>
        <div>
            <a href="{{route('area-personal.editarModulo', ['curso' =>$buscarCurso[0], 'modulo'=> $buscarModulo[0]])}}">Editar modulo</a>
            <form class="formBtnEliminarModulo" action="{{route('eliminando-modulo',['curso'=> $buscarCurso[0], 'modulo'=> $buscarModulo[0]])}}" method="POST"> @csrf @method('delete') <button>Eliminar modulo</button></form>
        </div>
        @endif
    </div>
    <div class="cont-material-clase">
        <h2>Material de clase</h2>
        @if (Auth::user()->admin == 1 || $buscarCurso[0]->identificacion == Auth::user()->identificacion)
        <table>
            <thead>
                <tr>
                    <th>Nombre del archivo</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pdfsModulos as $pdf)
                    <tr>
                        <td class="td-nombrePdf"><a href="{{$pdf->url_pdf}}" target="_blank">{{$pdf->nombre_pdf}}</a></td>
                        <td class="td-button"><form class="form-btn-borrar" action="{{route('eliminandoPdfModulo', ['curso'=>$buscarCurso[0], 'pdf'=>$pdf->id_pdf])}}" method="POST"> @csrf @method('delete') <button>borrar</button> </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn-aggPdf" href="">Agregar Pdf</a>
        @else
            <div>
                @foreach ($pdfsModulos as $pdf)
                    <a href="{{$pdf->url_pdf}}" target="_blank">{{$pdf->nombre_pdf}}</a>
                @endforeach
            </div>
        @endif
        
    </div>
    <div class="cont-descripcion">
        <h2>Descripcion</h2>
        <p>{{$buscarModulo[0]->desc_modulo}}</p>
    </div>
    <div class="ventana-flotante">
        <form action="{{route('agregandoPdfModulo',['curso'=>$buscarCurso[0],'modulo'=> $buscarModulo[0]])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Agregar pdf <small>(maximo 5MB)</small></label>
            <input type="file" name="pdf_modulo" accept="application/pdf">
            <small class="small none">El archivo es demasiado grande</small>
            @error('pdf_modulo')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Agregar</button>
                <a class="btn-cancelarAggPdf" href="">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
