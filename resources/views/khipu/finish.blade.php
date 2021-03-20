@extends('layouts.app')

@section('title', 'payments-finish')

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col">

                <div class="container mt-5 ">
                    <div class="row">
                        <div class="col text-center mb-3 font-weight-bold pago-realizado"><i
                                class="fas fa-check-circle primary"></i></div>
                    </div>
                </div>
                <h3 class="text-center">El pago fue realizado con éxito. Gracias por tu compra!!</h3>
                <div class="text-center m-5">
                    <a class="text-center ir-tienda" href="{{ route('welcome') }}"><i class="fas fa-store"></i> Ir a
                        la tienda</a>
                </div>


            </div>
        </div>
    </div>
@endsection
