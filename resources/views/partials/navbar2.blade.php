    <header>
        <!-- Barra de navegación superior -->
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="{{ route('register') }}" class="navbar-top-links">Registro</a>
                </li>
                <li class="navbar-top-item">
                    <a href="{{ route('login') }}" class="navbar-top-links">Iniciar sesión</a>
                </li>
                <!--Botón para ver el carrito -->
                <li class="navbar-top-item">

                    @if (count(Cart::getContent()))
                        <a href="{{ route('cart.checkout') }}" class="navbar-top-links">
                            <i class="zmdi zmdi-shopping-cart"></i></i><span
                                class="badge badge-danger">{{ count(Cart::getContent()) }}</span> Carrito
                            <i class="zmdi zmdi-chevron-down"></i>
                        </a>
                    @endif
                </li>
            </ul>
        </nav>
        <!-- Barra de navegación  -->
        <nav class="navbar">
            <header class="nabvar-mobile is-size-5-mobile">
                <a class="navbar-mobile-link has-text-white" href="#" id="btn-mobile"><i class="zmdi zmdi-menu"></i></a>
                <a class="navbar-mobile-link has-text-white" href="index.html">CAFperfumes</a>
                <a class="navbar-mobile-link has-text-white" href="#"><i class="zmdi zmdi-shopping-cart"></i> Vacio</a>
            </header>
            <nav class="navbar navbar-expand-md ml-0 nav-menu" id="mySidenav">
                <form class="form-group " action="#">
                    <div class="form-group-container">
                        <span class="form-group-icon"><i class="zmdi zmdi-search"></i></span>
                        <input type="text" class="form-group-input" placeholder="Buscar...">
                    </div>
                </form>

                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark"
                    href="{{ route('welcome') }}">CAFperfumes</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item"><a href="{{ route('welcome') }}" class="nav-menu-link">Inicio</a></li>
                    <li class="nav-menu-item" id="men">
                        <a class="nav-menu-link link-submenu active" href="#">Hombre <i
                                class="zmdi zmdi-chevron-down"></i></a>
                        <div class="container-sub-menu">
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item ">
                                    <a class="nav-menu-link" href="#">
                                        <strong>Casual</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisas Polo</a>
                                        </li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">
                                        <strong>Formal</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Trajes</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
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
                        <a href="#" class="nav-menu-link link-submenu">Mujer <i class="zmdi zmdi-chevron-down"></i> </a>
                        <div class="container-sub-menu">

                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item ">
                                    <a class="nav-menu-link" href="#">
                                        <strong>Casual</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisas Polo</a>
                                        </li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">
                                        <strong>Formal</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Trajes</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="ads is-hidden-touch">
                                <h1 class="ads-h1">Ofertas de Verano</h1>
                                <h2 class="ads-h2">Desde el 50% de descuento</h2>
                            </div>
                        </div>
                    </li>
                    <li class="nav-menu-item"><a href="{{ route('contact') }}" class="nav-menu-link">Contacto</a></li>
                    <li class="nav-menu-item"><a href="{{ route('home') }}" class="nav-menu-link">Home</a></li>
                    <li class="nav-menu-item"><a href="{{ route('register') }}" class="nav-menu-link">Registro</a>
                    </li>
                    <li class="nav-menu-item"><a href="{{ route('login') }}" class="nav-menu-link">Iniciar Sesión</a>
                    </li>

                </ul>
            </nav>
        </nav>
    </header>