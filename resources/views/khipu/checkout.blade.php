@extends('layouts.app')

@section('title', 'checkout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h2 class="mb-3"><b>Transferir con Khipu</b></h2>
                        <img class="mb-3" src="https://s3.amazonaws.com/static.khipu.com/buttons/2015/150x50-transparent.png" alt="khipu-transferencia">
                        <p><b>Valor</b>: $ {{ $order->total }}</p>
                        <p><b>Orden de compra</b>: {{ $order->cod }}</p>

                        <!--Redirige al botón Khipu-->
                       <form method="POST" action="{{ route('payments') }}">
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

