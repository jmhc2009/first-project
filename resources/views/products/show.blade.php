@extends('layouts.app')
@section('title', 'Product | ' . $product->name)

@section('content')
    <div class="container m-auto">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <!--Botones, eliminar, actualizar.                  -->
                    <img width="400px" src="{{ Storage::url($product->image) }}">


                </div>
                <!--Información del producto                -->
                <div class="col-md-6">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <hr>
                        <h4> $ {{ $product->price }}</h4>
                        <p>Precio retail : $ {{ $product->priceRetail }}</p>
                        <p>Stock disponible : {{ $product->stock }}</p>
                        <p>Categoría :{{ $product->category->name }}</p>
                        <p class="card-text">DESCRIPCIÓN :{{ $product->description }} This is a wider card with supporting
                            text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                        {{-- Botón agregar al carrito --}}
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            {{-- <input class="btn btn-cart input-cart" type="number" value="{{ $product->quantity }}"
                                name="quantity" min="1" max="100"> --}}
                            <button class="btn btn-cart btn-form" type="submit">
                                Agregar <i class="fas fa-shopping-cart"></i></button>

                        </form>

                        <p class="card-text"><small class="text-muted"><a class="btn btn-link mt-3"
                                    href="{{ route('welcome') }}"><i class="fas fa-chevron-circle-left"></i>
                                    Volver a la tienda</a></small></p>

                    </div>
                    {{-- Botones editar y eliminar, solo para usuarios con rol administrador --}}
                    @if (auth()->check())
                        @if (auth()
            ->user()
            ->hasRoles('admin'))
                            {{-- Botón para eleiminar producto desde la vista show --}}
                            <div class="card-body mt-3 d-flex content-center">
                                <form method="POST" action="{{ route('product.destroy', $product) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger mx-5 btn-form"><i class="fas fa-trash-alt"></i>
                                        Eliminar</button>
                                </form>

                                {{-- Botón para editar producto desde la vista show --}}
                                <a class="btn btn-sm btn-outline-primary btn-form"
                                    href="{{ route('product.edit', $product) }}"><i class="fas fa-edit"></i> Editar</a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
