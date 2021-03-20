<!-- Barra de navegación superior -->
<nav class="navbar-top">
    <ul class="navbar-top-ul">
        <li class="navbar-top-item">
            <a href="{{ route('register') }}" class="navbar-top-links">Registro</a>
        </li>
        <li class="navbar-top-item">
            <a href="{{ route('login') }}" class="navbar-top-links">Iniciar sesión</a>
        </li>

        <!--Botón para ver el carrito en barra nav superior -->
        <li class="navbar-top-item">

            @if (count(Cart::getContent()) >= 1)
                <a href="{{ route('cart.checkout') }}" class="navbar-top-links">
                    <i class="zmdi zmdi-shopping-cart"></i><span
                        class="badge badge-danger">{{ count(Cart::getContent()) }}</span> Carrito
                    <i class="zmdi zmdi-chevron-down"></i>
                </a>
            @endif
        </li>
    </ul>
</nav>

<!-- Barra de navegación principal -->
<nav class="navbar navbar-principal mt-5 mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top" id="mySidenav ">
        <div class="container d-flex">
            <a class="navbar-brand is-uppercase has-text-weight-bold has-text-dark nav-menu-link p-4"
                href="{{ url('/') }}">
                {{ config('app.name', 'CAFperfumes') }}
            </a>
            <button class="navbar-toggler boton-mobile" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="nav-menu-ul">
                    <!--menu-->
                    <li class="nav-menu-item ">
                        <a href="{{ route('welcome') }}"
                            class="nav-link nav-menu-link {{ request()->routeIs('welcome') ? 'active' : '' }}">Inicio</a>
                    </li>
                    <!--Submenu-->

                    <li class="nav-menu-item dropdown">
                        <a href="#" class="nav-link nav-menu-link dropdown-toggle" id="menu-categorias"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorías
                        </a>
                        <div class="dropdown-menu" aria-labelledby="menu-categorias">
                            <a href="#" class="dropdown-item">Mujeres</a>
                            <a href="#" class="dropdown-item">Hombres</a>
                            <a href="#" class="dropdown-item">Niñas</a>
                            <a href="#" class="dropdown-item">Niños</a>
                        </div>
                    </li>

                    <li class="nav-menu-item">
                        <a href="{{ route('contact') }}"
                            class="nav-link nav-menu-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contacto</a>
                    </li>

                    <!--Botón para ver el carrito -->
                    <li class="nav-menu-item ml-5 is-hidden-mobile">
                        @if (count(Cart::getContent()))
                            <a href="{{ route('cart.checkout') }}"
                                class="nav-link nav-menu-link {{ request()->routeIs('cart.checkout') ? 'active' : '' }}"><i
                                    class="fas fa-shopping-cart carrito"></i><span
                                    class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                        @endif
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Acceso al panel de administración/Muestra el home -->
                    @if (auth()->check())
                        @if (auth()
        ->user()
        ->hasRoles('admin'))
                            <li class="nav-menu-item">
                                <a href="{{ route('home') }}"
                                    class="nav-link nav-menu-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                            </li>
                        @endif
                    @endif

                    <!-- Authentication Links/Invitados -->
                    @guest
                        <li class="nav-menu-item">
                            <a class="nav-link nav-menu-link {{ request()->routeIs('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">Ingresar</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-menu-item">
                                <a class="nav-link nav-menu-link {{ request()->routeIs('register') ? 'active' : '' }}"
                                    href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-menu-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle nav-menu-link" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-menu-item p-2">
                        <form class="form-group " action="#">
                            <div class="form-group-container">
                                <span class="form-group-icon"><i class="zmdi zmdi-search"></i></span>
                                <input type="text" class="form-group-input" placeholder="Buscar...">
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</nav>
