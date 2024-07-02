@extends('layouts.app')

@section('content')
<div class="f-d-bg-login-register">
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
                <div class="f-d-card-register">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="f-d-form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="f-d-form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="f-d-form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="f-d-form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="restaurant_name" class="form-label text-secondary">Nome Ristorante</label>
                                <input type="text" class="form-control @error('restaurant_name') is-invalid @enderror" id="restaurant_name"
                                    name="restaurant_name" placeholder="Inserisci il nome">
                            </div>
                            @error('restaurant_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="address" class="form-label text-secondary">Indirizzo</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Inserisci l'indirizzo">
                            </div>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="image" class="form-label text-secondary">Immagine</label>
                                <input type="file" accept="image/*"
                                    class="form-control @error('image') is-invalid @enderror" id="uploadImage"
                                    name="image" value="{{ old('image') }}" maxlength="255">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label text-secondary">Descrizione</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Inserisci la descrizione">
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="vat" class="form-label text-secondary">Partita IVA</label>
                                <input type="text" class="form-control" id="vat" name="vat"
                                    placeholder="Inserisci la Partita IVA">
                            </div>
                            @error('vat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                    <button type="submit" class="f-d-button">
                                        {{ __('Register') }}
                                    </button>
                                    <a href="{{ route('login') }}" class="f-d-button">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection