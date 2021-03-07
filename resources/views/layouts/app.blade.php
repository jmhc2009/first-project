<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CAFperfumes') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('css/styles.css') }}" rel="stylesheet">-->


    <!--Estilos de la plantilla-->
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-design-iconic-font.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!--navbar -->
        @include('partials/navbar2')

        <!--Contenido principal -->
        @yield('content')

        <!--Script js-->
        @yield('js')

        <!--Pie de página-->
        @include('partials/footer2')
    </div>
</body>

</html>
