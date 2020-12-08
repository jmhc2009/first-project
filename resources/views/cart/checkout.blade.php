@extends('layouts.app')
@section('title','Cart')
@section('content')


<div class="container">
    <div class="card">
        <div class="card-body">
    <div class="row">
        <div class="col-8">
            <h3 class="text-center">Carrito de compras</h3>
            @if(Cart::getContent()->count()>0)
            <div class="col sm-6 ">
                {{-- Vacía el carrito --}}
                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger mb-3" type="submit" >Vaciar el carrito</button>
                </form>
            </div>
            {{-- Muestra la información en el carrito al precional el botón agregar al carrito --}}
            @if (count(Cart::getContent()))
            <table class="table   table-hover table-responsive-lg">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    {{-- Muestra la información en el carrito al precionar el botón agregar al carrito --}}
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td><img  src="{{ Storage::url($item->attributes->image) }}" width="100px" alt="Sin imagen">  {{ $item->name }}</td>
                            <td> $ {{$item->price }}</td>
                            <td>{{ ($item->quantity) }}</td>
                            <td>$ {{$item->price * $item->quantity }}</td>
                            <td>
                                {{-- Elimina un producto del carro --}}
                                <form method="POST" action="{{ route('cart.remouveitem') }}">
                                    @csrf @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-outline"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        <tr> {{-- Muestra el subtotal en el carro --}}
                            <td colspan="2"></td>
                            <td><h6>Total</h6></td>
                            <td><h6> $ {{ Cart::getSubTotal() }}</h6></td>
                        </tr>
                </tbody>
            </table>
            <div class="container">
                <div class="row ">
                    <div class="col sm-6 p-4">
                        
                        <div class="d-flex justify-content-end d-block ">
                            <a class="btn btn-link" href="{{ route('welcome') }}"><-Seguir comprando</a>
                            @if(auth()->check())
                                @auth
                                    <a  class="btn btn-outline-success" href="/order/create">Realizar pedido</a>
                                @endauth
                            @else
                                <a  class="btn btn-outline-success" href="/login">Realizar pedido</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
            @else
                <p>Carrito vacío</p>
            @endif
            @else
                <div class="jumbotron text-center">
                    Tu carrito está vacío!!
                    <a class="btn btn-link btn-outline-success ml-3" href="{{ route('welcome') }}">Ir a la tienda</a>
                </div>
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endsection
