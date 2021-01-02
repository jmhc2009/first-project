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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"/>

    <style>
        body {
            padding-top: 56px;
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CAFperfumes') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!--menu-->
                        <li class="nav-item">
                            <a href="{{ route('welcome') }}" class="nav-link">Inicio</a>
                        </li>
                        <!--Submenu-->

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="menu-categorias" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Categorías
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menu-categorias">
                                <a href="#" class="dropdown-item">Mujeres</a>
                                <a href="#" class="dropdown-item">Hombres</a>
                                <a href="#" class="dropdown-item">Niñas</a>
                                <a href="#" class="dropdown-item">Niños</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contacto</a>
                        </li>

                        <!--Botón para ver el carrito -->
                        <li class="nav-item ml-5">
                            @if(count(Cart::getContent()))
                                <a href="{{ route('cart.checkout') }}"><i
                                        class="fas fa-shopping-cart carrito"></i><span
                                        class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                            @endif
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Acceso al panel de administración/Muestra el home -->
                        @if(auth()->check())
                            @if(auth()->user()->hasRoles('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                                </li>
                            @endif
                        @endif

                        <!-- Authentication Links/Invitados -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-2">
            @yield('content')

        </main>
        @if(session()->has('success'))
                <script>
                    toastr.success("{{ session('success') }}")
                </script>
        @endif
    </div>
    <footer class=" container my-5 pt-5 text-muted text-center text-small">
        <div class="row border-top py-5">
            <div class="col">
                <p class="mb-1">{!!"&copy;". date("Y")!!} CAFperfumes</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Contacto</a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-whatsapp"></i> +56964144105</a></li>
                    <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i> ventas@cafperfumes.cl</a>
                    </li>
                </ul>
                <div class="col text-right">
                    <a href="#" class="btn btn-link"><i class="far fa-arrow-alt-circle-up"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
