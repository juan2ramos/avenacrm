<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title') Avena Cubana</title>
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500,500i,700,700i,900,900i">
</head>
<body>
<header class="container row align-center">
    <div class="m-t-l-8 col-8 col-l-3 ">
        <figure>
            <a href="/"><img width="200px" src="{{asset('images/logo.png')}}" alt=""></a>
        </figure>
    </div>
    @if(auth()->check())
        <nav class="main-nav col-10">
            <ul class="row justify-center is-list-less">
                <li><a href="{{route('productos.index')}}">Productos</a></li>
                <li><a href="">Puntos</a></li>
                <li><a href="">Zonas</a></li>
                <li><a href="">Usuarios</a></li>
                <li><a href="">Inventario</a></li>
            </ul>
        </nav>
    @else
        <div class=" col-10  hide-phone"><h1 class="is-text-center">Sistema de puntos Avena Cubana</h1></div>
    @endif
    <nav class="col-8 col-l-3 ">
        <ul class="is-list-less row justify-end ">
            @if(auth()->check())
                <li><a href="/">{{auth()->user()->name. ' ' . auth()->user()->last_name}}</a></li>
                <li class="m-l-12"><a href="{{ route('logout') }}">Salir</a></li>
            @else
                <li><a href="/login">Ingresar</a></li>
            @endif
        </ul>
    </nav>
</header>
<main class="container">@yield('content')</main>

<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
