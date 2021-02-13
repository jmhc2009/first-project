@extends('layouts.app')
@section('content')
    {{-- Notificaciones con toastr --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <!--@toastr_css-->

    {{-- carrusel --}}

    @include('partials/carrusel')

    {{-- Contenido principal --}}
    <main class="container mt-3 bg-white p-3">
        <div class="row">
            <div class="col">
                <!--buscador-->
                <div class="container search mt-3">
                    <div class="row">
                        <div class="col-8 p-4 m-auto">
                            <form class="d-flex" method="GET" action="{{ route('welcome') }}" id="search" name="search">
                                <input class="form-control me-2" type="search" placeholder="Ingresa una fragancia"
                                    aria-label="Search">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                {{-- Muestra el carrito --}}
                @include('partials.session-status')

                @if (count(Cart::getContent()))
                    <a href="{{ route('cart.checkout') }}">Ver carrito <i class="fas fa-shopping-cart"></i><span
                            class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                @endif

                {{-- Muestra detalles del producto --}}
                <div class="row py-4">
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="card card-product">
                                {{-- muestra la pagina individual de cada producto --}}
                                <a href="{{ route('product.show', $product) }}" class="#">
                                    <img class="card-img-top" src="{{ Storage::url($product->image) }}" alt="">
                                </a>
                                {{-- fin pagina individual --}}
                                <div class="card-body">
                                    <h4 class="card-title">{{ $product->name }}</h4>
                                    <h5 class="card-text ">Precio $ {{ $product->price }}</h5>
                                    <p class="card-text">Precio retail $ {{ $product->priceRetail }}</p>
                                    <p class="card-text">Cuotas 3 x {{ number_format($product->price / 3) }} sin
                                        interés</p>
                                    {{-- Agregar producto al carrito --}}
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="submit" name="btn" class="btn btn-sm btn-primary mb-2" value="Agregar">
                                        <i class="fas fa-shopping-cart"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </main>
@endsection
