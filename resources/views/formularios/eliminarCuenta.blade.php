@extends('layout.PGeneral')

@section('titulo', 'Cuentas')
@section('cssJs')
    <link rel="stylesheet" href="{{asset('css/cuentas.css')}}">
    <script src="{{asset('js/eliminarCuenta.js')}}" defer></script>
@endsection
    
@section('titulo-encabezado', 'Cuentas')
    

@section('contenido')
    <div class="cont-desc">
        <h2>Eliminar cuenta</h2>
        <p>Aqui podra eliminar una cuenta de usuario.</p>
    </div>
    <div class="cont-form-eliminarCuenta">
        <form class="form-eliminarCuenta" action="{{route('eliminando-cuenta')}}" method="POST">
            @csrf
            @method('delete')
            <label for="">Correo</label>
            <input type="text" name="correo" value="{{old('correo')}}">
            @error('correo')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Eliminar</button>
                <a href="{{route('area-personal.cuentas')}}">Cancelar</a>
            </div>
        </form>
    </div>
    @include('profesor.alerta.alerta')
@endsection