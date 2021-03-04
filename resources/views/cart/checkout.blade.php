@extends('layouts.app')
@section('title', 'checkout')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col ">
                <div class="card p-5">
                    <body class="bg-light">
                    <div class="container d-flex justify-content-center ">

                        <!--Inicio del carrito-->
                        <div class="row">
                            <div class="col-md-12 order-md-2 mb-4 ">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">

                                    <!--Vuelve al carrito-->
                                    @if (count(Cart::getContent()))
                                        <a href="{{ route('cart.checkout') }}" class="btn-link mt-3 mb-3 ">Su pedido <i
                                                class="fas fa-shopping-cart"></i><span
                                                class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>


                                    @else

                                    <!--Muestra el carrito vacío-->
                                        <div class="jumbotron text-center">
                                            <p>Tu carrito está vacío!!</p><br>
                                            <a class="btn btn-cart-realizar btn-link btn-outline-dark ml-3  "
                                               href="{{ route('welcome') }}"><i class="fas fa-store"></i> Ir a la
                                                tienda</a>
                                        </div>
                                    @endif
                                </h4>

                                <!--Productos en el carro-->
                                <ul class="list-group mb-3">
                                    @foreach (Cart::getContent() as $item)
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">
                                                    <img src="{{ Storage::url($item->attributes->image) }}"
                                                         width="50px" alt="imagen producto">

                                                    <span>
                                                        <small class="text-muted">
                                                            {{ $item->name }}
                                                            {{ $item->quantity }} x
                                                            ${{ number_format($item->price) }} =
                                                            <!--Subtotal-->
                                                           <b> ${{ number_format($item->price * $item->quantity) }} </b><br><br>

                                                        <!--Botones interior carro-->
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col d-flex justify-content-sm-start">

                                                                             <!--Aumentar/Disminuir cantidad-->
                                                                            <form action="{{ route('cart.updateitem') }}"
                                                                                  method="POST">
                                                                                @csrf
                                                                                <div class="container d-flex">
                                                                                    <input type="hidden" name="id"
                                                                                           value="{{ $item->id }}">

                                                                                    <!--Actualizar cantidad de prod en el carro-->
                                                                                    <input class="btn btn-cart input-cart btn-outline-dark d-flex justify-content-center" type="number"
                                                                                           value="{{ $item->quantity }}"
                                                                                           name="quantity"
                                                                                           min="1" max="100">
                                                                                    <button type="submit"
                                                                                            class="btn btn-cart btn-actualizar btn-outline-dark d-flex justify-content-center ">
                                                                                        <i class="fas fa-sync-alt"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </form>


                                                                                <!--Elimina un producto del carro-->
                                                                        <form method="POST"
                                                                              action="{{ route('cart.remouveitem') }}">
                                                                            @csrf @method('DELETE')
                                                                            <input type="hidden" name="id"
                                                                                   value="{{ $item->id }}">
                                                                            <button type="submit"
                                                                                    class="btn btn-cart btn-outline-dark d-flex justify-content-center"><i
                                                                                    class="fas fa-trash-alt"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </small>
                                                    </span>
                                                </h6>
                                            </div>
                                        </li>
                                    @endforeach

                                    <!-- Muestra info solo si el carro tiene productos-->
                            @if (count(Cart::getContent()))

                                        <li class="list-group-item d-flex justify-content-between">
                                            <span><strong>Neto</strong></span>
                                            <strong>{{ number_format(Cart::getSubTotal() / 1.19) }}</strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span><strong>Iva (19%)</strong></span>
                                            <strong>{{ number_format(Cart::getSubTotal() - Cart::getSubTotal() / 1.19) }}</strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span><strong>Total</strong></span>
                                            <strong>$ {{ number_format(Cart::getSubTotal()) }}</strong>
                                        </li>
                                    </ul>

                                    <!--Boton realizar pedido a usuarios registrados-->
                                    <div class="input-group">
                                        @if (auth()->check())
                                            @auth
                                                <a class="btn btn-dark btn-xs btn-block btn-cart-realizar" href="/order/create">Realizar
                                                    pedido</a>
                                            @endauth
                                        @else
                                            <a class="btn btn-outline-dark btn-block btn-cart-realizar" href="/login">Realizar
                                                pedido</a>
                                        @endif
                                        <div class="d-flex justify-content-end d-block mt-2">
                                            <a class="btn btn-link" href="{{ route('welcome') }}"><i
                                                    class="fas fa-chevron-circle-left"></i>
                                                Seguir comprando</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin carrito -->
                            @endif
                        </div>
                    </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
@stop
