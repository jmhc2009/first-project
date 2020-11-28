@extends('layouts.app')
@section('title','checkout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card px-5">

                <body class="bg-light">
                    <div class="container">
                        <div class="py-5 text-center">
                            <img class="d-block mx-auto mb-4" src="images/logo.jpg" alt="" width="72" height="72">
                            <h2>Formulario de pedido</h2>
                            <p class="lead">Por favor ingrese la siguente información para el envío de su pedido.</p>
                        </div>
                        <!--Resumen del carrito-->
                        <div class="row">
                            <div class="col-md-4 order-md-2 mb-4">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <!--Vuelve al carrito-->
                                    @if(count(Cart::getContent()))
                                        <a href="{{ route('cart.checkout') }}">Su pedido <i class="fas fa-shopping-cart"></i><span
                                                class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                                    @endif
                                </h4>
                                <ul class="list-group mb-3">
                                  @foreach (Cart::getContent() as $item)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">{{ $item->name }}</h6>
                                            <small class="text-muted">{{ ($item->quantity) }} x $ {{number_format($item->price,0) }}</small>
                                        </div>
                                        <span class="text-muted">$ {{number_format($item->price * $item->quantity,0) }}</span>
                                    </li>
                                    @endforeach
                                    <li class="list-group-item d-flex justify-content-between bg-light">
                                        <div class="text-success">
                                            <h6 class="my-0">Codigo promoción</h6>
                                            <small>CODEJEMPLO</small>
                                        </div>
                                        <span class="text-success">-$5</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong>Neto</strong></span>
                                        <strong>{{ number_format(Cart::getSubTotal(),0) }}</strong>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong>Iva (19%)</strong></span>
                                        <strong>{{ number_format(Cart::getSubTotal()*0.19,0) }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong>Total</strong></span>
                                        <strong>$ {{ number_format(Cart::getSubTotal(),0) }}</strong>
                                    </li>

                                </ul>
                                <!--Ingreo de código promocional-->
                            <form class="card p-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Ingresar código">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Aplicar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Formulario que solicita información del cliente-->
                            <div class="col-md-8 order-md-1">
                                <h4 class="mb-3">Información para el envío y facturación</h4>
                                <form method="POST" action="{{ route('order.store') }}"
                                    class="needs-validation" novalidate>
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
                                            placeholder="Villa/Población   Calle N° Dpto." required>
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
                                                Please select a valid country.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="city">Ciudad</label>
                                            <select class="custom-select d-block w-100" id="city" name="city" required>
                                                <option value="">Elejir...</option>
                                                <option>San Bernardo</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Zip code required.
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
                                    <hr class="mb-4">

                                    <h4 class="mb-3">Forma de pago</h4>

                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="credit" name="paymentMethod" type="radio"
                                                class="custom-control-input" checked required>
                                            <label class="custom-control-label" for="credit">Tarjeta de crédito</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="debit" name="paymentMethod" type="radio"
                                                class="custom-control-input" required>
                                            <label class="custom-control-label" for="debit">Tarjeta de débito</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="paypal" name="paymentMethod" type="radio"
                                                class="custom-control-input" required>
                                            <label class="custom-control-label" for="paypal">PayPal</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-name">Name on card</label>
                                            <input type="text" class="form-control" id="cc-name" placeholder=""
                                                required>
                                            <small class="text-muted">Full name as displayed on card</small>
                                            <div class="invalid-feedback">
                                                Name on card is required
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-number">Credit card number</label>
                                            <input type="text" class="form-control" id="cc-number" placeholder=""
                                                required>
                                            <div class="invalid-feedback">
                                                Credit card number is required
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="cc-expiration">Expiration</label>
                                            <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                                required>
                                            <div class="invalid-feedback">
                                                Expiration date required
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="cc-cvv">CVV</label>
                                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Security code required
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-4">

                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Ir a pagar</button>
                                </form>
                                {{-- Procesar pago --}}



                                <hr class="mb-4">
                            </div>
                        </div>
                </body>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">&copy; 2013-2020 CAFperfumes</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Politicas</a></li>
                        <li class="list-inline-item"><a href="#">Terminos y condiciones</a></li>
                        <li class="list-inline-item"><a href="#">Soporte</a></li>
                    </ul>
                </footer>


            </div>
        </div>
    </div>
</div>

@endsection
