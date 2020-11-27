@extends('layouts.app')
@section('title','Product | '.$product->name) 
@section('content')
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        {{-- Editar producto  --}}
                        <div class="d-flex">
                            <div class="card-body mt-3">
                                <img width="400px" src="{{Storage::url($product->image) }}">                                
                                @if(auth()->check())                        
                                    @if(auth()->user()->hasRoles('admin'))
                                    <div class="card-body mt-3 d-flex">                        
                                        <form method="POST" action="{{ route('product.destroy', $product) }}">
                                            @csrf @method('DELETE')
                                             <button class="btn btn-sm btn-danger mx-5">Eliminar</button> 
                                        </form>                                       
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('product.edit', $product)}}">Editar</a>
                                    </div>
                                    @endif
                                @endif                       
                            </div> 
                            <div class="card-body mt-3">
                                <h1>{{ $product->name }}</h1>  
                                <hr>
                                <h3> $ {{ $product->price }}</h3> 
                                <p>Precio retail : $ {{ $product->priceRetail }}</p>
                                <p>Stock disponible : {{ $product->stock }}</p> 
                                <h5>DESCRIPCIÓN :{{ $product->description }}</h5>
                                <p>Categoría :{{ $product->category->name }}</p>

                                {{-- Botón agregar al carrito --}}
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="number" value="1" name="quantity" min="1" max="100">
                                    <input type="submit" value="Agregar al carro"  class="btn btn-sm btn-primary d-block mt-2">                          
                                </form> 

                                <a class="btn btn-link mt-3" href="{{ route('welcome') }}"><-Volver a la tienda</a>                                
                            </div>               
                        </div>
                    </div>                                                                
               </div>                       
            </div>
        </div>
    </div>
</div>
@endsection







