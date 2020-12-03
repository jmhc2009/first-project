@extends('layouts.app')

@section('title', 'checkout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <h2>Pago con webpay</h2>
                    <p><b>Valor</b>: $ {{ $order->total }}</p>
                    <p><b>Orden de compra</b>: {{ $order->id }}</p>


                    <form method="POST" action="{{ route('checkout') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary mb-3 text-center">Pagar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
