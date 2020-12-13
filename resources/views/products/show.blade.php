@extends('layouts.app')
@section('title','Product | '.$product->name) 
@section('content')
    <div class="container">        
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
              <div class="col-md-6">
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
              <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <hr>
                    <h4> $ {{ $product->price }}</h4> 
                    <p>Precio retail : $ {{ $product->priceRetail }}</p>
                    <p>Stock disponible : {{ $product->stock }}</p> 
                    <p>Categoría :{{ $product->category->name }}</p>
                    <p class="card-text">DESCRIPCIÓN :{{ $product->description }} This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  {{-- Botón agregar al carrito --}}
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="number" value="1" name="quantity" min="1" max="100">
                    <input type="submit" value="Agregar al carro"  class="btn btn-sm btn-primary d-block mt-2">                          
                </form> 

                  <p class="card-text"><small class="text-muted"><a class="btn btn-link mt-3" href="{{ route('welcome') }}"><-Volver a la tienda</a></small></p>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection







