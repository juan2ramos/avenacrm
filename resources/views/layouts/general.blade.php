<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title')   Avena Cubana</title>
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500,500i,700,700i,900,900i">
</head>
<body>
@yield('content')
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
