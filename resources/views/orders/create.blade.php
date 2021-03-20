@extends('layouts.app')
@section('title', 'checkout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">

                    <body class="bg-light">
                        <div class="container">

                            <!-- Inicio Formulario de pedido -->
                            <div class="py-5 text-center">
                                <h1 class="lead d-flex text-content-start">Información para el envío de su pedido.</h1>
                            </div>

                            <!--Resumen del carrito-->
                            <div class="row">

                                <div class="col-md-4 order-md-2 mb-4 is-hidden-mobile">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">

                                        <!--Vuelve al carrito-->
                                        @if (count(Cart::getContent()))
                                            <a class="su-pedido" href="{{ route('cart.checkout') }}">Su pedido <i
                                                    class="zmdi zmdi-shopping-cart"></i><span
                                                    class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                                        @endif
                                    </h4>
                                    <ul class="list-group mb-3">
                                        @foreach (Cart::getContent() as $item)
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0">{{ $item->name }}</h6>
                                                    <img src="{{ asset('images/' . $item->attributes->image) }}"
                                                            width="50px" alt="imagen producto">
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
                                            <strong>${{ number_format(Cart::getSubTotal(), 0) }}</strong>
                                        </li>

                                    </ul>

                                </div>
                                <!-- Fin resumen carrito-->

                                <!--Formulario que solicita información del cliente-->
                                <div class="col-md-8 order-md-1">

                                    <form method="POST" action="{{ route('payments') }}" class="needs-validation">
                                        @csrf
                                        <div class="row">

                                            <!--Campo nombre-->
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Nombres *</label>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                    id="name" name="name" placeholder="" value="{{ old('name') }} "
                                                    required>
                                                @if ($errors->has('name'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                            <!--Campo apellidos-->
                                            <div class="col-md-6 mb-3">
                                                <label for="surname">Apellidos *</label>
                                                <input type="text"
                                                    class="form-control @error('surname') is-invalid @enderror" id="surname"
                                                    name="surname" placeholder="" value="{{ old('surname') }}" required>
                                                @if ($errors->has('surname'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('surname') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!--Campo email-->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email *</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" placeholder="email@ejemplo.com"
                                                    value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                            <!--Campo teléfono-->
                                            <div class="col-md-6 mb-3">
                                                <label for="phone">Teléfono *</label>
                                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                    id="phone" name="phone" placeholder="Teléfono/Celular"
                                                    value="{{ old('phone') }}" required>
                                                @if ($errors->any('phone'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <!--Campo dirección-->
                                        <div class="mb-3">
                                            <label for="address">Dirección *</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                                id="address" name="address" placeholder="Avda./Calle N° Dpto."
                                                value="{{ old('address') }}" required>
                                            @if ($errors->has('address'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </div>
                                            @endif
                                        </div>

                                        <!--Campo región-->
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="country">Región *</label>
                                                <select
                                                    class="custom-select d-block w-100 form-control @error('region') is-invalid @enderror"
                                                    id="region" name="region" required>
                                                    <option value="{{ old('region') }}">Elejir...</option>
                                                    <option>RM</option>
                                                </select>
                                                @if ($errors->has('region'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('region') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                            <!--Campo ciudad-->
                                            <div class="col-md-4 mb-3">
                                                <label for="city">Ciudad *</label>
                                                <select
                                                    class="custom-select d-block w-100 form-control @error('city') is-invalid @enderror"
                                                    id="city" name="city" required>
                                                    <option value="{{ old('city') }}">Elejir...</option>
                                                    <option>San Bernardo</option>
                                                </select>
                                                @if ($errors->has('city'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                            <!--Campo villa/población-->
                                            <div class="col-md-4 mb-3">
                                                <label for="villa" name="villa">Villa/Población</label>
                                                <input type="text" class="form-control @error('villa') is-invalid @enderror"
                                                    id="villa" placeholder="" value="{{ old('villa') }}" required>
                                                @if ($errors->has('villa'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('villa') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                            <!--Textarea mensaje opcional-->
                                            <div class="mb-3 col-12">
                                                <label for="message">Mensaje<span
                                                        class="text-muted">(Opcional)</span></label>
                                                <textarea type="text" class="form-control" id="message" name="message"
                                                    placeholder="Información adicional para el envío"></textarea>
                                            </div>
                                        </div>

                                        <hr class="mb-4">

                                        <!--Checkbox-->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="same-address">
                                            <label class="custom-control-label" for="same-address">La dirección de envío es
                                                la misma que mi
                                                dirección de facturación</label>
                                        </div>
                                        <!--Fin formulario despacho-->
                                        <hr class="mb-4">

                                        <p>(*) Los campos con * son obligatorios.</p>

                                        <!--Formas de pago-->

                                        <div class="d-block my-3">

                                            {{-- Pago con debito/credito webpay --}}

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img width="200px" class="img-webpay mb-3"
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
                                                            <!--Imagen Khipu-->
                                                            <img class="mb-4"
                                                                src="https://s3.amazonaws.com/static.khipu.com/buttons/2015/150x50-transfer-transparent.png">
                                                            <div class="custom-control custom-radio">
                                                                <input id="transferencia" name="paymentMethod" type="radio"
                                                                    class="custom-control-input" value="transferencia"
                                                                    checked required>
                                                                <label class="custom-control-label mb-2"
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
