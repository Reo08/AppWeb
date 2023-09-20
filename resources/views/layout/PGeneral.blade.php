<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/app-web/resources/css/header_nav_encabezado.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;700&family=Nunito+Sans:opsz,wght@6..12,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;700&family=Nunito+Sans:opsz,wght@6..12,200;6..12,400;6..12,700&display=swap" rel="stylesheet">
    <script src="/app-web/resources/js/areaPersonal.js" defer type="module"></script>
    <script src="/app-web/resources/js/btn-burguer.js" defer type="module"></script>
    @yield('cssJs')
</head>
<body>
    <div class="cont-principal">
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
                <li><a href="{{route('area-personal.perfil')}}"><span class="material-symbols-outlined">person</span> Perfil</a></li>
                <li><a href="{{route('area-personal')}}" class="{{request()->routeIs('area-personal')?'active':''}}"><span class="material-symbols-outlined">home</span> Area Personal</a></li>
                <li><a href="{{route('area-personal.mis-cursos')}}" class="{{request()->routeIs('area-personal.mis-cursos')?'active':''}}"><span class="material-symbols-outlined">cases</span> Mis Cursos</a></li>
                <li><a href="{{route('area-personal.notas')}}" class="{{request()->routeIs('area-personal.notas')?'active':''}}"><span class="material-symbols-outlined">grade</span> Notas</a></li>
                <li><a href="{{route('area-personal.configuracion')}}" class="{{request()->routeIs('area-personal.configuracion')?'active':''}}"><span class="material-symbols-outlined">settings</span> Configuraciones</a></li>
                @if (Auth::user()->admin == 1)
                    <li><a href="{{route('area-personal.cuentas')}}" class="{{request()->routeIs('area-personal.cuentas*')?'active':''}}"><span class="material-symbols-outlined">manage_accounts</span> Cuentas</a></li>
                @endif
                @if (Auth::user()->rol == "profesor")
                    <li><a href="{{route('administrar')}}" class="{{request()->routeIs('administrar*')?'active':''}}"><span class="material-symbols-outlined">admin_panel_settings</span> Administrar</a></li>
                @endif
                <li><form action="{{route('cerrarSesion')}}" method="POST">@csrf <a href="#" onclick="this.closest('form').submit()"><span class="material-symbols-outlined">door_open</span>Cerrar Sesion</a></form></li>
            </ul>
        </section>
        <main>
            <div class="main-cont">
                <div class="main-cont__titulo">
                    <h2>@yield('titulo-encabezado')</h2>
                </div>
                <div class="main-cont__four">
                    <a class="a1" href="{{route('area-personal.perfil')}}">
                        <div>
                            <p>Tu perfil</p>
                            <p>Perfil</p>
                        </div>
    
                        <div>
                            <span class="material-symbols-outlined">school</span>
                        </div>
                    </a>
                    <a class="a2" href="{{route('area-personal.configuracion')}}">
                        <div>
                            <p>Preferencias</p>
                            <p>Configuraciones</p>
                        </div>
                        <div>
                            <span class="material-symbols-outlined">settings</span>
                        </div>
                    </a>
                    <a class="a3" href="{{route('area-personal.notas')}}">
                        <div>
                            <p>Desempeño</p>
                            <p>Notas</p>
                        </div>
                        <div>
                            <span class="material-symbols-outlined">grade</span>
                        </div>
                    </a>
                    <a class="a4" href="{{route('area-personal.mis-cursos')}}">
                        <div>
                            <p>Mis cursos</p>
                        </div>
                        <div>
                            <span class="material-symbols-outlined">cases</span>
                        </div>
                    </a>
                </div>
            </div>
            @yield('contenido')
            <div class="main-cont-copy">
                <p>Copyright © 2023. Todos los derechos reservados.</p>
            </div>
        </main>
        <div class="boton-sec-nav">
            <p>></p>
        </div>
    </div>
</body>
</html>