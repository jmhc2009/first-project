@extends('layouts.app')
@section('title', 'checkout')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="card p-5">

                    <body class="bg-light">
                        <div class="container">
                            <!--Resumen del carrito-->
                            <div class="row">
                                <div class="col-md-4 order-md-2 mb-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <!--Vuelve al carrito-->
                                        @if (count(Cart::getContent()))
                                            <a href="{{ route('cart.checkout') }}" class="mt-3 mb-3">Su pedido <i
                                                    class="fas fa-shopping-cart"></i><span
                                                    class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                                        @endif
                                    </h4>
                                    <ul class="list-group mb-3">
                                        @foreach (Cart::getContent() as $item)
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0">{{ $item->name }}</h6>
                                                    <small class="text-muted">{{ $item->quantity }} x
                                                        $ {{ number_format($item->price) }}</small>
                                                </div>
                                                <span class="text-muted">$
                                                    {{ number_format($item->price * $item->quantity) }}</span>
                                            </li>
                                        @endforeach

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
                                    <!--Boton realizar pedido-->

                                    <div class="input-group">
                                        @if (auth()->check())
                                            @auth
                                                <a class="btn btn-primary btn-xs btn-block btn" href="/order/create">Realizar
                                                    pedido</a>
                                            @endauth
                                        @else
                                            <a class="btn btn-primary btn-xs btn-block" href="/login">Realizar
                                                pedido</a>
                                        @endif
                                        <div class="d-flex justify-content-end d-block mt-2">
                                            <a class="btn btn-link" href="{{ route('welcome') }}">
                                                <- Volver a la tienda</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin resumen carrito -->

                                <!-- Inicio carrito de compras-->
                                <div class="col-md-8 order-md-1">
                                    <h4 class="text-center mt-3">Carrito de compras </h4>
                                    @if (Cart::getContent()->count() > 0)
                                        <div class="col sm-6 mb-3 ">
                                            <!--  Vacía el carrito -->
                                            <form method="POST" action="{{ route('cart.clear') }}">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-outline-primary btn-xs" type="submit">Vaciar el
                                                    carrito
                                                </button>
                                            </form>
                                        </div>
                                        @include('partials.session-status')
                                        <!-- Muestra la información en el carrito  -->
                                        @if (count(Cart::getContent()))
                                            <table class="table table-hover table-responsive-lg">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (Cart::getContent() as $item)
                                                        <tr>

                                                            <td><img src="{{ Storage::url($item->attributes->image) }}"
                                                                    width="80px" alt="Sin imagen"></td>
                                                            <td class="align-self-center"> {{ $item->name }}</td>
                                                            <td> $ {{ $item->price }}</td>
                                                            <!--Aumentar o disminuir unidades-->
                                                            <td>
                                                                {{-- Agregar varios
                                                                producto al
                                                                carrito --}}
                                                                <form action="{{ route('cart.updateitem') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                                    <input type="number" value="{{ $item->quantity }}"
                                                                        name="quantity" min="1" max="100">
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm btn-actualizar mb-1">
                                                                        <i class="fas fa-sync-alt">
                                                                        </i></button>
                                                                </form>

                                                                {{-- <form action="{{ route('cart.upitem') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                                    <input type="submit" name="btn"
                                                                        class="btn btn-block btn-sm btn-primary mb-2 boton"
                                                                        value="+">
                                                                </form>
                                                                <form action="{{ route('cart.downitem') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                                    <input type="submit" name="btn"
                                                                        class="btn btn-block btn-sm btn-primary mb-2 boton"
                                                                        value="-">
                                                                </form> --}}
                                                            </td>
                                                            <td>$ {{ $item->price * $item->quantity }}</td>
                                                            <td>
                                                                {{-- Elimina un producto del
                                                                carro --}}
                                                                <form method="POST"
                                                                    action="{{ route('cart.remouveitem') }}">
                                                                    @csrf @method('DELETE')
                                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                                    <button type="submit" class="btn btn-outline"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p>Carrito vacío</p>
                                        @endif
                                    @else
                                        <div class="jumbotron text-center">
                                            Tu carrito está vacío!!
                                            <a class="btn btn-link btn-outline-primary ml-3"
                                                href="{{ route('welcome') }}">Ir a la tienda</a>
                                        </div>
                                    @endif
                                </div>
                                <!--Fin carro de compras-->
                            </div>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        Swal.fire(
            'Bienvenido!',
            'Click en el botón para cerrar!',
            'success'
        );

    </script>
@stop
