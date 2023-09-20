<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplicativo web</title>
    <link rel="stylesheet" href="/app-web/resources/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;700&family=Nunito+Sans:opsz,wght@6..12,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;700&family=Nunito+Sans:opsz,wght@6..12,200;6..12,400;6..12,700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="cont-logo">
            <a href="#"><img src="/app-web/public/img/ESCUDO-COLOR-H.png" alt=""></a>
        </div>
        <div class="cont-ingresar">
            <a href="#ingresar"><span class="material-symbols-outlined">person</span> Ingresar</a>
        </div>
    </header>
    <main>
        <div class="nombre-aplicativo">
            <h1>APLICATIVO WEB DE APRENDIZAJE</h1>
        </div>
        <section class="sec-form" id="ingresar">
            <form action="{{route('login')}}" method="POST">
                @csrf
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> ⚠ {{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <legend>Ingresa a tu cuenta</legend>
                <input type="email" name="correo" placeholder="Correo" value="{{old('correo')}}" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <p>Las 'Cookies' deben estar habilitadas en su navegador</p>
                <button>Acceder</button>
            </form>
        </section>
        <section class="sec-contacto">
            <div>
                <h2>Contacto</h2>
                <p>correo@gemail.com</p>
            </div>
            <div>
                <h2>Company</h2>
                <p>Oficina de educacion virtual y a distancia</p>
            </div>
            <div>
                <h2>Soporte</h2>
                <a href="">http://soporteaulas.ucundinamarca.edu</a>
            </div>
        </section>
    </main>
    <footer>
        <section class="sec-social">
            <img src="/app-web/public/img/logo-blanco.png" alt="">
            <div>
                <a href="">Ruta para facebook https</a>
                <img src="/app-web/storage/app/public/icons-redes/facebook.png" alt="">
                <a href="">Ruta para youtube https</a>
                <img src="/app-web/storage/app/public/icons-redes/youtube.png" alt="">
            </div>
        </section>
        <section class="sec-copy">
            <p>Copyright © 2023. Todos los derechos reservados.</p>
            {{-- <a href="https://www.flaticon.es/iconos-gratis/facebook" title="facebook iconos">Facebook iconos creados por Freepik - Flaticon</a> --}}
        </section>
    </footer>
</body>
</html>