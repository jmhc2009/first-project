@extends('layouts.app')
@section('content')


    {{-- carrusel --}}

    @include('partials/carrusel')

    <!-- Barra de navegacion secundaria -->
    @include('partials/navbarSecundaria')

    <!-- Sección de fotografías -->

    <div class="container">

        <div class="columns is-multiline">
            <div class="column is-full-mobile">
                <div class="columns is-centered is-mobile is-multiline">

                    <!-- 1 Sección de fotografías -->
                    @foreach ($products as $product)
                        <div class="col-3 column is-half column-full">
                            <div class="card">
                                <span class="price">${{ $product->price }}</span>
                                <img src="{{ Storage::url($product->image) }}" alt="">
                                <div class="card-info">
                                    <h4 class="has-text-black has-text-centered has-text-weight-bold">
                                        {{ $product->name }}
                                        {{ $product->price }}</h4>
                                    <p class="has-text-centered">Classic casual t-shirt for women on the move.
                                        100%
                                        cotton.</p>
                                    <div class="card-buttons">
                                        {{-- Agregar al carro --}}
                                        {{-- <form action="{{ route('cart.add') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="submit" name="btn" class="btn btn--mini-rounded"><i
                                        class="zmdi zmdi-shopping-cart"></i>
                                    </form> --}}

                                        <a href="#" class="btn btn--mini-rounded"><i
                                                class="zmdi zmdi-shopping-cart"></i></a>
                                        <a href="#" class="btn btn--mini-rounded"><i
                                                class="zmdi zmdi-favorite-outline"></i></a>
                                        <a href="producto.html" class="btn btn--mini-rounded"><i
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
