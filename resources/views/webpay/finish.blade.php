@extends('layouts.app')
@section('title', 'finish')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">

                    @if($order->status === 'pagado')
                    <div class="container">
                        <div class="row">
                            <div class="col text-center mb-3 font-weight-bold"><i class="fas fa-check-circle"></i></div>
                        </div>
                    </div>

                        <h3 class="text-center">El pago fue realizado con éxito. Gracias por tu compra!!</h3>
                    @else
                    <div class="container">
                        <div class="row">
                            <div class="col text-center m-5 font-weight-bold">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        <h3 class="text-center">Lo sentimos tu pago no pudo ser procesado!!</h3>
                    </div>
                    <div class="text-center m-5">
                        <a class="text-center" href="{{ route('welcome') }}"><-Volver a la tienda</a>
                    </div>
                    @endif

            </div>
        </div>
    </div>
@endsection
