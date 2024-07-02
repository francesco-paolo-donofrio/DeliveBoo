@extends('layouts.app')

@section('content')
<div class="f-d-bg-login-register">
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
                <div class="f-d-card-register">

                    <h1 class="card-header mb-3">{{ __('Registrazione') }}</h1>


                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="Inserisci il tuo nome" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail*') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Inserisci la tua e-mail" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" placeholder="inserisci una password"
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Inserisci nuovamente la password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Nome Ristorante*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('restaurant_name') is-invalid @enderror" id="restaurant_name"
                                    name="restaurant_name" placeholder="Inserisci il nome del ristorante" value="{{ old('restaurant_name') }}">
                                </div>                               
                            </div>
                            @error('restaurant_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Inserisci l'indirizzo" value="{{ old('address') }}">
                                </div>
                            </div>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-4 row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Immagine</label>
                                <div class="col-md-6">
                                    <input type="file" accept="image/*"
                                    class="form-control @error('image') is-invalid @enderror" id="uploadImage"
                                    name="image" value="{{ old('image') }}">
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Inserisci la descrizione">{{ old('description') }}
                                </div>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-4 row">
                                <label for="vat" class="col-md-4 col-form-label text-md-right">Partita IVA*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="vat" name="vat"
                                    placeholder="Inserisci la Partita IVA" value="{{ old('vat') }}">
                                </div>
                            </div>
                            @error('vat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                    <button type="submit" class="f-d-button">
                                        {{ __('Registrati') }}
                                    </button>
                                    <a href="{{ route('login') }}" class="f-d-button">
                                        {{ __('Cancella') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>*Campi obbligatori</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection