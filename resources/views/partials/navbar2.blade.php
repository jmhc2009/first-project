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
            @else
                <a href="{{ route('cart.checkout') }}" class="navbar-top-links"><i
                        class="zmdi zmdi-shopping-cart"></i> Vacío</a>
            @endif
        </li>
    </ul>
</nav>


<!-- Barra de navegación principal  -->
<nav class="navbar navbar-principal shadow-sm pt-5 pb-5">

    <!--Navegación para dispositivos mobiles-->
    <header class="nabvar-mobile is-size-5-mobile">
        <a class="navbar-mobile-link has-text-white" href="#" id="btn-mobile"><i class="zmdi zmdi-menu"></i></a>
        <a class="navbar-mobile-link has-text-white" href="{{ route('welcome') }}">CAFperfumes</a>
        <!--Muestra el carrito en dispositivos moviles-->
        @if (count(Cart::getContent()) >= 1)
            <a class="navbar-mobile-link has-text-white" href="{{ route('cart.checkout') }}"><i
                    class="zmdi zmdi-shopping-cart"><span
                        class="badge badge-danger">{{ count(Cart::getContent()) }}</span> </i></a>
        @else
            <a class="navbar-mobile-link has-text-white" href="{{ route('cart.checkout') }}"><i
                    class="zmdi zmdi-shopping-cart">Vacío</i></a>
        @endif
    </header>

    <!--Buscador-->
    <nav class="navbar navbar-expand-md ml-0 nav-menu" id="mySidenav">
        <form class="form-group " action="#">
            <div class="form-group-container">
                <span class="form-group-icon"><i class="zmdi zmdi-search"></i></span>
                <input type="text" class="form-group-input" placeholder="Buscar...">
            </div>
        </form>
        <a class="navbar-brand is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark"
            href="{{ url('/') }}">
            {{ config('app.name', 'CAFperfumes') }}
        </a>
        <ul class="nav-menu-ul">
            <li class="{{ request()->routeIs('welcome') ? 'active' : '' }} nav-menu-item    "><a
                    href="{{ route('welcome') }}" class="nav-menu-link">Inicio</a>
            </li>
            <li class="nav-menu-item" id="men">
                <a class="nav-menu-link link-submenu" href="#">Hombre <i class="zmdi zmdi-chevron-down"></i></a>
                <div class="container-sub-menu">
                    <ul class="sub-menu-ul">
                        <li class="nav-menu-item ">
                            <a class="nav-menu-link" href="#">
                                <strong>Casual</strong>
                                <i class="zmdi zmdi-chevron-down "></i>
                            </a>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisas Polo</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sub-menu-ul">
                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">
                                <strong>Formal</strong>
                                <i class="zmdi zmdi-chevron-down "></i>
                            </a>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Trajes</a></li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ads is-hidden-touch">
                        <h1 class="ads-h1">Ofertas de Verano</h1>
                        <h2 class="ads-h2">Desde el 50% de descuento</h2>
                    </div>
                </div>
            </li>
            <li class="nav-menu-item" id="women">
                <a href="#" class="nav-menu-link link-submenu">Mujer <i class="zmdi zmdi-chevron-down"></i>
                </a>
                <div class="container-sub-menu">

                    <ul class="sub-menu-ul">
                        <li class="nav-menu-item ">
                            <a class="nav-menu-link" href="#">
                                <strong>Casual</strong>
                                <i class="zmdi zmdi-chevron-down "></i>
                            </a>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisas Polo</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sub-menu-ul">
                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">
                                <strong>Formal</strong>
                                <i class="zmdi zmdi-chevron-down "></i>
                            </a>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a>
                                </li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Trajes</a></li>
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ads is-hidden-touch">
                        <h1 class="ads-h1">Ofertas de Verano</h1>
                        <h2 class="ads-h2">Desde el 50% de descuento</h2>
                    </div>
                </div>
            </li>
            <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }} nav-menu-item"><a
                    href="{{ route('contact.index') }}" class="nav-menu-link">Contacto</a>
            </li>

            @if (auth()->check())
                @if (auth()
        ->user()
        ->hasRoles('admin'))

                    <li class="nav-menu-item"><a href="{{ route('home') }}" class="nav-menu-link">Home</a>
                    </li>

                @endif
            @endif

            <!-- Authentication Links/Invitados -->
            @guest


                <li class="nav-menu-item"><a href="{{ route('login') }}" class="nav-menu-link">Iniciar
                        Sesión</a>
                </li>

                @if (Route::has('register'))
                    <li class="nav-menu-item">
                        <a href="{{ route('register') }}" class="nav-menu-link">Registro</a>
                    </li>
                @endif

            @else
                <!--Muestra el usuario que inició seción-->
                <li class="nav-menu-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle nav-menu-link" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} {{ Auth::user()->surname }}
                    </a>

                    <!--Botón para cerrar sesión-->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-menu-link" href="{{ route('logout') }}"
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
        </ul>
    </nav>
</nav>
