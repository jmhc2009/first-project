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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />

    {{-- estilos de la plantilla --}}

    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/styles2.css">

</head>

<body>
    <div id="app">

        {{-- navbar --}}
        @include('partials/navbar2')

        {{-- Contenido principal --}}
        @yield('content')
        <!--        Script js-->
        @yield('js')

    </div>
    <!--    Pie de página-->
    @include('partials/footer2')

</body>

</html>
