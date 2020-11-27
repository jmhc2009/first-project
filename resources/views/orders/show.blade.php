@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Detalle del pedido</h1>

            <h6>Pedido id: {{ $order->id }}</h6>
            <h6>Código: {{ $order->cod }}</h6>

            <h4>Información para el envío</h4>
            <h6>Nombre: {{ $order->user->name }} {{ $order->user->surname }}</h6>
            <h6>Teléfono : {{ $order->phone }} E-mail : {{ $order->user->email }}</h6>
            <h6>Dirección: {{ $order->address }}</h6>
            <h6>Ciudad: {{ $order->city }} Región: {{ $order->region }}</h6>
            <h5>Subtotal : $ {{ $order->subTotal }}</h5>
            <h5>IVA : $ {{ $order->impuesto }}</h5>
            <h5>Total : $ {{ $order->total }}</h5>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table   table-hover table-responsive-lg">
                <thead>
                    <tr class="">
                        <th>Id Producto</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                @foreach($order->products as $product)
                    <tbody>
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="{{ route('product.show',$product) }}"><img
                                        src="{{ Storage::url($product->image) }}" width="100px"
                                        alt="Sin imagen"></a></td>
                            <td>{{ $product->name }}</td>
                            <td> $ {{ $product->price }}</td>
                            <td>{{ $product->pivot->units }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

</div>




@endsection
