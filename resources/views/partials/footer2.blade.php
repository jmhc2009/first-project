<footer class="footer">
    <div class="container">
        <div class="columns is-multiline">
            <div class="column">
                <ul class="footer-ul">
                    <li class="footer-item">
                        <h3 class="has-text-weight-bold">Información</h3>
                    </li>
                    <li class="footer-item"><a class="footer-link" href="#">Quienes somos?</a></li>
                    <li class="footer-item"><a class="footer-link" href="#">contacto@cafperfumes.cl</a></li>

                </ul>
            </div>

            <div class="column">
                <ul class="footer-ul">
                    <li class="footer-item">
                        <h3 class="has-text-weight-bold">Porqué comprar</h3>
                    </li>
                    <li class="footer-item"><a class="footer-link" href="#">Envios y retornos</a></li>
                    <li class="footer-item"><a class="footer-link" href="#">Envios seguros</a></li>

                </ul>
            </div>
            <div class="column">
                <ul class="footer-ul">
                    <li class="footer-item">
                        <h3 class="has-text-weight-bold">Tu cuenta</h3>
                    </li>
                    <li class="footer-item"><a class="footer-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                    <li class="footer-item"><a class="footer-link" href="{{ route('register') }}">Registro</a></li>

                </ul>
            </div>
            <div class="column">
                <ul class="footer-ul">
                    <li class="footer-item">
                        <h3 class="has-text-weight-bold">Catalogo</h3>
                    </li>
                    <li class="footer-item"><a class="footer-link" href="#">Catálogo para hombres</a></li>
                    <li class="footer-item"><a class="footer-link" href="#">Catálogo para mujeres</a></li>

                </ul>
            </div>
            <div class="column">

                <ul class="footer-ul">
                    <li class="footer-item">
                        <h3 class="has-text-weight-bold">Datos de contacto</h3>
                    </li>
                    <li class="footer-item"><a class="footer-link" href="#"><i class="fas fa-mobile-alt"></i>
                            +56964144105</a></li>
                    <li class="footer-item"><a class="footer-link" href="#"><i class="fas fa-envelope"></i>
                            contacto@cafperfumes.cl</a></li>

                </ul>
            </div>
            <div class="column is-full">
                <div class="footer-socials">
                    <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-facebook"></i></a>
                    <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-twitter"></i></a>
                    <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-instagram"></i></a>
                    <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bar-top">
        <div class="container">
            <p class="text-center footer-bar-top-links">{!! '&copy;' . date('Y') !!} CAFperfumes</p>
        </div>
    </div>
</footer>
