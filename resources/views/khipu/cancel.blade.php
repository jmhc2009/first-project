@extends('layouts.app')
@section('title', 'payments-cancel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col text-center m-5 font-weight-bold cancel ">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-5">
                    <h3 class="text-center">Tu pedido no será procesado porque cancelaste el pago!!</h3>
                </div>
                <div class="text-center m-5 ">
                    <a class="text-center-primary ir-tienda" href="{{ route('welcome') }}"><i class="fas fa-store"></i> Ir
                        a la
                        tienda</a>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
