@extends('layouts.app')

@section('title', 'checkout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="card">
                    <div class="card-body">
                        <p><b>El resumen de tu compra es:</b></p>
                        <ul>
                            <li>Valor total a pagar: $ {{ $order->total }}</li>
                        </ul>
                        <ul>
                            Orden de compra: {{ $order->cod }}
                        </ul>

                        @if ($data)
                            <div>
                                <ul>
                                    @foreach ($data as $name => $value)
                                        {{-- <li><strong>{{ $name }}</strong> = {{ $value }}</li> --}}
                                        <!--Le asignamos los valores-->
                                        <?php $khipu_service->setParameter($name, $value); ?>
                                    @endforeach
                                </ul>
                                <p><b>Presiona el botón y elige como quieres pagar</b></p>
                                <div>
                                    <!--Generamos el formulario.-->
                                    {{ print $khipu_service->renderForm() }}
                                </div>
                            </div>

                        @else
                            <div>Aquí se generará el botón de pago.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
