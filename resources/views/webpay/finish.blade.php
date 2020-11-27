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
                            <div class="col text-center mb-3 font-weight-bold"><i class="fas fa-times"></i></div>
                        </div>
                    </div>
                        <h3 class="text-center">Lo sentimos tu pago no pudo ser procesado!!</h3>
                    @endif

            </div>
        </div>
    </div>
@endsection
