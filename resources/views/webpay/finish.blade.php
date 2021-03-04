@extends('layouts.app')
@section('title', 'finish')

@section('content')

    <div class="container p-5">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    @if($order->status === 'pagado')
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col text-center mb-3 font-weight-bold"><i class="fas fa-check-circle primary"></i></div>
                            </div>
                        </div>

                            <h3 class="text-center">El pago fue realizado con éxito. Gracias por tu compra!!</h3>
                            <div class="text-center m-5">
                                <a class="text-center" href="{{ route('welcome') }}"><i class="fas fa-store"></i> Ir a la
                                                tienda</a>
                            </div>
                    @else
                        <div class="container">
                            <div class="row">
                                <div class="col text-center m-5 font-weight-bold">
                                    <i class="fas fa-times-circle fallido"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-5">
                            <h2 class="text-center">Lo sentimos tu pago no pudo ser procesado!!</h2>
                            <h4>Orden de Compra {{ $order->cod }} rechazada</h4>
                        </div>
                            <div class="container ">
                                <div class="row">
                                    <div class="col ml-5">
                                            <p><b>Las posibles causas de este rechazo son:</b></p>
                                            <p>Error en el ingreso de su tarjeta Crédito/Débito (fecha y/o código de seguridad)</p>
                                            <p>Su tarjeta Crédito/Débito no cuenta con saldo suficiente</p>
                                            <p>Tarjeta aún no habilitada en el sistema financiero</p>
                                    </div>
                                </div>


                            </div>


                        <div class="text-center m-5">
                            <a class="text-center" href="{{ route('welcome') }}"><i class="fas fa-store"></i> Ir a la
                                                tienda</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
