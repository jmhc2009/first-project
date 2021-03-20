@extends('layouts.app')
@section('title', 'contacto')

@section('content')
    <div class="container contacto mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 ">
                    <div class="card-header is-hidden-mobile">Contacto</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="text" class="col-md-4 col-form-label text-md-left ">Nombre</label>

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
                            <div class="form-group row mb-2">
                                <label for="text" class="col-md-4 col-form-label text-md-left">Teléfono</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2 ">
                                <label for="email" class="col-md-4 col-form-label text-md-left ">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="message" class="col-md-4 col-form-label text-md-left">Mensaje</label>

                                <div class="col-md-6">
                                    <textarea id="message" type="textarea"
                                        class="form-control @error('message') is-invalid @enderror" name="message" required
                                        autocomplete="current-password"></textarea>

                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-outline-dark btn-cart-realizar mt-3">
                                        Enviar
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
