@extends('layouts.app')
@section('title', 'checkout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card px-5">

                    <body class="bg-light">
                        <div class="container">
                            <div class="py-5 text-center">
                                {{-- Inicio Formulario de pedido --}}
                                <h1 class="lead">Por favor ingrese la siguente información para el envío de su pedido.</h1>
                            </div>
                            <!--Resumen del carrito-->
                            <div class="row">
                                <div class="col-md-4 order-md-2 mb-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <!--Vuelve al carrito-->
                                        @if (count(Cart::getContent()))
                                            <a href="{{ route('cart.checkout') }}">Su pedido <i
                                                    class="fas fa-shopping-cart"></i><span
                                                    class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                                        @endif
                                    </h4>
                                    <ul class="list-group mb-3">
                                        @foreach (Cart::getContent() as $item)
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0">{{ $item->name }}</h6>
                                                    <small class="text-muted">{{ $item->quantity }} x $
                                                        {{ number_format($item->price, 0) }}</small>
                                                </div>
                                                <span class="text-muted">$
                                                    {{ number_format($item->price * $item->quantity, 0) }}</span>
                                            </li>
                                        @endforeach

                                        <li class="list-group-item d-flex justify-content-between">
                                            <span><strong>Neto</strong></span>
                                            <strong>{{ number_format(Cart::getSubTotal(), 0) }}</strong>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between">
                                            <span><strong>Iva (19%)</strong></span>
                                            <strong>{{ number_format(Cart::getSubTotal() * 0.19, 0) }}</strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span><strong>Total</strong></span>
                                            <strong>$ {{ number_format(Cart::getSubTotal(), 0) }}</strong>
                                        </li>

                                    </ul>

                                </div>
                                <!-- Fin resumen carrito, codigo promocional -->

                                <!--Formulario que solicita información del cliente-->
                                <div class="col-md-8 order-md-1">

                                    <form method="POST" action="{{ route('order.store') }}" class="needs-validation"
                                        novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Nombres</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder=""
                                                    value="" required>
                                                <div class="invalid-feedback">
                                                    Valid first name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="surname">Apellidos</label>
                                                <input type="text" class="form-control" id="surname" name="surname"
                                                    placeholder="" value="" required>
                                                <div class="invalid-feedback">
                                                    Valid last surname is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="email@ejemplo.com" value="" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address for shipping updates.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone">Teléfono</label>
                                                <input type="tel" class="form-control" id="phone" name="phone"
                                                    placeholder="Teléfono/Celular" value="" required>
                                                <div class="invalid-feedback">
                                                    Valid phone is required.
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <label for="address">Dirección</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Avda./Calle N° Dpto." required>
                                            <div class="invalid-feedback">
                                                Please enter your shipping address.
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label for="country">Región</label>
                                                <select class="custom-select d-block w-100" id="region" name="region"
                                                    required>
                                                    <option value="">Elejir...</option>
                                                    <option>RM</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Por favor ingrese una región válida.
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="city">Ciudad</label>
                                                <select class="custom-select d-block w-100" id="city" name="city" required>
                                                    <option value="">Elejir...</option>
                                                    <option>San Bernardo</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Por favor elija una ciudad.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Villa/Población</label>
                                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Ingrese la villa o población.
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="message">Mensaje<span
                                                        class="text-muted">(Opcional)</span></label>
                                                <textarea type="text" class="form-control" id="message" name="message"
                                                    placeholder="Información adicional para el envío"></textarea>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="same-address">
                                            <label class="custom-control-label" for="same-address">La dirección de envío es
                                                la misma que mi
                                                dirección de facturación</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-info">
                                            <label class="custom-control-label" for="save-info">Guarde esta información para
                                                la próxima
                                                vez</label>
                                        </div>
                                        <!--Fin formulario despacho-->
                                        <hr class="mb-4">

                                        <!--Formas de pago-->

                                        <div class="d-block my-3">

                                            {{-- Pago con debito/credito webpay --}}

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img width="150px" class="img-webpay mb-4"
                                                                src="/images/webpay.png" alt="webpay">
                                                            <div class="custom-control custom-radio">
                                                                <input id="credit" name="paymentMethod" type="radio"
                                                                    class="custom-control-input" value="debito-credito"
                                                                    checked required>
                                                                <label class="custom-control-label mb-3"
                                                                    for="credit">Tarjeta
                                                                    de
                                                                    debito/crédito</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img width="100px" class="img-webpay mb-4"
                                                                src="/images/khipu.png" alt="webpay">
                                                            <div class="custom-control custom-radio">
                                                                <input id="transferencia" name="paymentMethod" type="radio"
                                                                    class="custom-control-input" value="transferencia"
                                                                    checked required>
                                                                <label class="custom-control-label mb-3"
                                                                    for="transferencia">Transferencia</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Fin formas de pago-->

                                        <!--Boton ir a pagar-->
                                        <button class="btn btn-primary btn-lg btn-block  btn-form mb-5 content-center mt-3"
                                            type="submit">Ir a pagar</button>
                                    </form>
                                    {{-- Sdeguir comprando --}}
                                    <div class="d-flex justify-content-end d-block mb-3">
                                        <a class="btn btn-link" href="{{ route('welcome') }}"><i
                                                class="fas fa-chevron-circle-left"></i>
                                            Seguir comprando</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
@endsection
