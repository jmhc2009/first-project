@extends('layouts.app')

@section('title', 'checkout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h2>Pagar con webpay</h2>
                        <p><b>Valor</b>: $ {{ $order->total }}</p>
                        <p><b>Orden de compra</b>: {{ $order->cod }}</p>


                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary mb-3 text-center btn-form"><i
                                            class="fas fa-cash-register"></i> Ir a
                                        pagar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
