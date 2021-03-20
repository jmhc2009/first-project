@extends('adminlte::page')
@section('title', 'Crear producto')

@section('content')
    {{-- Mensaje --}}
    @include('partials/session-status')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear producto</div>
                    <div class="card-body">

                        {{-- formulario para crear producto --}}
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- nombre --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- categoría --}}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Categoría</label>

                                <div class="col-md-6">
                                    <select id="category_id" class="form-control @error('category') is-invalid @enderror"
                                        name="category_id" value="{{ old('category_id') }}" required
                                        autocomplete="category_id" autofocus>

                                        <option value="">--Elija una categoría--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach

                                    </select>

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Precio --}}
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Precio</label>

                                <div class="col-md-6">
                                    <input id="price" type="number"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required autocomplete="price" autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Precio retail --}}
                            <div class="form-group row">
                                <label for="priceRetail" class="col-md-4 col-form-label text-md-right">Precio retail</label>

                                <div class="col-md-6">
                                    <input id="priceRetail" type="number"
                                        class="form-control @error('priceRetail') is-invalid @enderror" name="priceRetail"
                                        value="{{ old('priceRetail') }}" required autocomplete="priceRetail" autofocus>

                                    @error('priceRetail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Stock --}}
                            <div class="form-group row">
                                <label for="stock" class="col-md-4 col-form-label text-md-right">Stock</label>

                                <div class="col-md-6">
                                    <input id="stock" type="number"
                                        class="form-control @error('stock') is-invalid @enderror" name="stock"
                                        value="{{ old('stock') }}" required autocomplete="stock" autofocus>

                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Precio oferta --}}
                            <div class="form-group row">
                                <label for="offer" class="col-md-4 col-form-label text-md-right">Precio oferta</label>

                                <div class="col-md-6">
                                    <input id="offer" type="number"
                                        class="form-control @error('offer') is-invalid @enderror" name="offer"
                                        value="{{ old('offer') }}" required autocomplete="offer" autofocus>

                                    @error('offer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Fecha --}}
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Fecha</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Imagen --}}
                            <div class="form-group row">
                                <label for="stock" class="col-md-4 col-form-label text-md-right">Imagen</label>

                                <div class="col-md-6">

                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ old('image') }}">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- descripción --}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="textarea"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        required autocomplete="current-password"></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- botón crear producto --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Crear producto
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
