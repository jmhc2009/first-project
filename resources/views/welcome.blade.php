@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/images/portada.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/images/portada1.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/images/portada2.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
{{-- Contenido principal --}}
<main class="container bg-light">
    <div class="row">
        <div class="col-12">
            <div class="py-4 border-bottom">
                <h1 class="text-center">PERFUMES DESTACADOS</h1>
            </div>
        </div>
    </div>
    {{-- Muestra los porductos agregados al carro --}}
    @if(count(Cart::getContent()))
        <a href="{{ route('cart.checkout') }}">Ver carrito <i class="fas fa-shopping-cart"></i><span
                class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
    @endif


        <div class="row py-4">
            {{-- Muestra detalles del producto --}}
            @foreach($products as $product)
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="card card-product">
                    <a href="{{ route('product.show',$product) }}" class="#">
                        <img class="card-img-top" src="{{ Storage::url($product->image) }}" alt="">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">Precio retail $ {{ $product->priceRetail }}</p>
                        <h5 class="card-text ">Precio $ {{ $product->price }}</h5>
                        <p class="card-text">Cuotas 3 x {{ number_format($product->price/3,0) }} sin
                            interés</p>
                        {{-- Agregar producto al carrito --}}
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="submit" name="btn" class="btn btn-sm btn-primary mb-2" value="Agregar">  <i class="fas fa-shopping-cart"></i>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    {{ $products->links() }}
</main>

@endsection
