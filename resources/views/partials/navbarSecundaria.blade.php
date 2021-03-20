<div class="container">
    <nav class="nav">
        <a class="nav-item has-text-weight-semibold {{ request()->routeIs('popular') ? 'active' : '' }}" href="#">Popular</a>
        <a class="nav-item has-text-weight-semibold {{ request()->routeIs('novedades') ? 'active' : '' }}" href="#">Novedades</a>
        <a class="nav-item has-text-weight-semibold {{ request()->routeIs('masVendidos') ? 'active' : '' }}" href="#">Más vendidos</a>
        <a class="nav-item has-text-weight-semibold {{ request()->routeIs('ofertas') ? 'active' : '' }}" href="#">Ofertas</a>
        <a class="nav-item has-text-weight-semibold {{ request()->routeIs('muyPronto') ? 'active' : '' }}" href="#">Muy pronto</a>
    </nav>
</div>


