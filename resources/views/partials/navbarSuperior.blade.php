<nav class="navbar-top mb-5">
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
