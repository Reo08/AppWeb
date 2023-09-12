<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="/app-web/resources/css/header_nav_encabezado.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;700&family=Nunito+Sans:opsz,wght@6..12,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;700&family=Nunito+Sans:opsz,wght@6..12,200;6..12,400;6..12,700&display=swap" rel="stylesheet">
    <script src="/app-web/resources/js/areaPersonal.js" defer type="module"></script>
    <script src="/app-web/resources/js/perfil.js" defer></script>
    <link rel="stylesheet" href="/app-web/resources/css/perfil.css">
</head>
<body>
    <header>
        <a href=""><img src="/app-web/public/img/ESCUDO-COLOR-H.png" alt=""></a>
        <div class="header-nav">
            <ul>
                <li class="config-nav-header"><span class="material-symbols-outlined">settings</span></li>
                <li class="img-perfil"><img src="{{Auth::user()->img_url}}" alt=""></li>
            </ul>
            <div class="despliegue-perfil">
                <div class="info">
                    <div class="cont-img"><img src="{{Auth::user()->img_url}}" alt=""></div>
                    <div class="nombre-correo">
                        <p>{{Auth::user()->nombre}}</p>
                        <p>{{Auth::user()->correo}}</p>
                    </div>
                </div>
                <ul>
                    <li><a href="{{route('area-personal.perfil')}}"><span class="material-symbols-outlined">person</span> Pefil</a></li>
                    <li><a href="{{route('area-personal.notas')}}"><span class="material-symbols-outlined">grade</span> Notas</a></li>
                    <li><a href="{{route('area-personal.configuracion')}}"><span class="material-symbols-outlined">settings</span> Configuraciones</a></li>
                    <li><form action="{{route('cerrarSesion')}}" method="POST">@csrf <a href="#" onclick="this.closest('form').submit()"><span class="material-symbols-outlined">door_open</span>Cerrar Sesion</a></form></li>
                </ul>
            </div>
            <div class="despliegue-config">
                <ul>
                    <li><h3>Navegacion</h3></li>
                    <li><a href="{{route('area-personal')}}"><span class="material-symbols-outlined">home</span> Area Personal</a></li>
                    <li><a href="{{route('area-personal.notas')}}"><span class="material-symbols-outlined">grade</span> Notas</a></li>
                    @if (Auth::user()->rol == "profesor")
                        <li><a href="{{route('administrar')}}"><span class="material-symbols-outlined">admin_panel_settings</span> Administrar</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </header>
    <section class="sec-nav">
        <ul>
            <li>Inicio</li>
            <li><a href="{{route('area-personal.perfil')}}" class="{{request()->routeIs('area-personal.perfil')?'active':''}}"><span class="material-symbols-outlined">person</span> Perfil</a></li>
            <li><a href="{{route('area-personal')}}"><span class="material-symbols-outlined">home</span> Area Personal</a></li>
            <li><a href="{{route('area-personal.notas')}}"><span class="material-symbols-outlined">grade</span> Notas</a></li>
            <li><a href="{{route('area-personal.configuracion')}}"><span class="material-symbols-outlined">settings</span> Configuraciones</a></li>
            @if (Auth::user()->admin == 1)
                <li><a href="{{route('area-personal.cuentas')}}" class="{{request()->routeIs('area-personal.cuentas*')?'active':''}}"><span class="material-symbols-outlined">manage_accounts</span> Cuentas</a></li>
            @endif
            @if (Auth::user()->rol == "profesor")
                <li><a href="{{route('administrar')}}" class="{{request()->routeIs('area-personal.administrar*')?'active':''}}"><span class="material-symbols-outlined">admin_panel_settings</span> Administrar</a></li>
            @endif
            <li><form action="{{route('cerrarSesion')}}" method="POST">@csrf <a href="#" onclick="this.closest('form').submit()"><span class="material-symbols-outlined">door_open</span>Cerrar Sesion</a></form></li>
        </ul>
    </section>
    <main>
        <div class="main-cont-color">
            <h1>{{Auth::user()->nombre}}</h1>
            <div class="cont-img-perfil">
                <img src="{{Auth::user()->img_url}}" alt="">
            </div>
            <div class="btn-edit-img">
                <span class="material-symbols-outlined">edit</span>
            </div>
        </div>
        <div class="main-cont-datos">
            <div>
                <h2>Perfil</h2>
                <p>Nombre</p>
                <p>{{Auth::user()->nombre}}</p>
                <p>Correo Electronico</p>
                <p>{{$infoUsuario->correo}}</p>
                <p>Cedula</p>
                <p>{{$infoUsuario->identificacion}}</p>
                <p>Telefono</p>
                <p>{{$infoUsuario->telefono}}</p>
                <p>Celular</p>
                <p>{{$infoUsuario->celular}}</p>
                <p>Direccion</p>
                <p>{{$infoUsuario->direccion}}</p>
                <div>
                    <a href="{{route('area-personal.perfil.editarPerfil')}}">Editar</a>
                </div>
            </div>
        </div>
        <div class="main-cont-copy">
            <p>Copyright © 2023. Todos los derechos reservados.</p>
        </div>
    </main>
    <div class="ventana-flotante">
        <form class="formImgPerfil" action="{{route('editando-img')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label for="">Selecciona nueva foto de perfil</label>
            <input type="file" name="imgPerfil" accept="image/jpeg, image/png" required>
            @error('imgPerfil')
                <small>*{{$message}}</small>
            @enderror
            <div>
                <button>Cambiar</button>
                <a href="">Cancelar</a>
            </div>
        </form>
    </div>
    @include('profesor.alerta.alerta')
</body>
</html>