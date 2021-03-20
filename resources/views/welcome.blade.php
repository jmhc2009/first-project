@extends('layouts.app')
@section('title', 'welcome')


@section('content')
    {{-- carrusel --}}
    @include('partials/carrusel')

    <!-- Barra de navegacion secundaria -->
    @include('partials/navbarSecundaria')

    <!--Botón para ver el carrito -->
    <div class="container navbar-top-item justify-content-end">

        @if (count(Cart::getContent()) >= 1)
            <a href="{{ route('cart.checkout') }}" class="btn btn-link">
                <i class="zmdi zmdi-shopping-cart"> <span
                        class="badge badge-danger">{{ count(Cart::getContent()) }}</span> Carrito </i>

            </a>
        @endif
    </div>

    @include('partials/session-status')

    <!-- Sección de fotografías/productos -->
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-full-mobile">
                <div class="columns is-centered is-mobile is-multiline">

                    <!-- 1 Sección de fotografías -->
                    @foreach ($products as $product)
                        <div class="col col-lg-3 column is-half column-full">
                            <div class="card">
                                <span class="price">${{ $product->price }}</span>
                                <img src="{{ asset('images/' . $product->image) }}" alt="Sin imagen">
                                <div class="card-info">
                                    <h4 class="has-text-black has-text-centered has-text-weight-bold">
                                        {{ $product->name }}
                                        ${{ $product->price }}</h4>
                                    <p class="has-text-centered">Classic casual t-shirt for women on the move.
                                        100%
                                        cotton.</p>
                                    <div class="card-buttons d-flex justify-content-center">

                                        <!--Agregar al carro -->
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button class="btn btn--mini-rounded "><i
                                                    class="zmdi zmdi-shopping-cart"></i></button>
                                        </form>
                                        <a href="#" class="btn btn--mini-rounded"><i
                                                class="zmdi zmdi-favorite-outline"></i></a>

                                        <!--Muestra la pagina individual de cada producto -->
                                        <a href="{{ route('product.show', $product) }}" class="btn btn--mini-rounded"><i
                                                class="zmdi zmdi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
