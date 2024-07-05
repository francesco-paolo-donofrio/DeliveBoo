@extends('layouts.app')

@section('content')
<div class="f-d-bg-login-register">
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
                <div class="f-d-card-register">
                    <h1 class="card-header mb-3 text-white fw-bold">{{ __('Registrazione') }}</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right text-white fw-bold">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="Inserisci il tuo nome" 
                                        autocomplete="name" autofocus>
                                        
                                        <div id="nameMessage" class="error-message"></div>

                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right text-white fw-bold">{{ __('Indirizzo e-mail*') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Inserisci la tua e-mail" autocomplete="email">
                                    
                                    <div id="emailMessage" class="error-message"></div>

                                    @error('email')
                                      <div class="alert alert-danger ">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right text-white fw-bold">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" placeholder="inserisci una password" autocomplete="new-password">
                                        
                                        <div id="pswMessage" class="error-message"></div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right text-white fw-bold">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Inserisci nuovamente la password"
                                        autocomplete="new-password">
                                        
                                        <div id="pswConfMessage" class="error-message"></div>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right text-white fw-bold">Nome
                                    Ristorante*</label>
                                <div class="col-md-6">
                                    <input type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror" id="restaurant_name" name="restaurant_name" placeholder="Inserisci il nome del ristorante" value="{{ old('restaurant_name') }}">
                                        
                                        <div id="rNameMessage" class="error-message"></div>
                                        @error('restaurant_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right text-white fw-bold">Indirizzo*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Inserisci l'indirizzo" value="{{ old('address') }}">
                                        
                                        <div id="addrMessage" class="error-message"></div>
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="image" class="col-md-4 col-form-label text-md-right text-white fw-bold">Immagine*</label>
                                <div class="col-md-6">
                                    <input name="image" type="file" accept="image/*"
                                        class="form-control @error('image') is-invalid @enderror" id="uploadImage"
                                        value="{{ old('image') }}">
                                        
                                        <div id="imgMessage" class="error-message"></div>
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right text-white fw-bold">Descrizione</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Inserisci la descrizione">
                                </div>              
                            </div>
                            
                            <div class="mb-4 row">
                                <label for="vat" class="col-md-4 col-form-label text-md-right text-white fw-bold">Partita IVA*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="vat" name="vat"
                                        placeholder="Inserisci la Partita IVA" value="{{ old('vat') }}">
                                        
                                        <div id="vatMessage" class="error-message"></div>
                                    @error('vat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    {{-- TIPOLOGIE --}}
                    <div class="d-flex justify-content-start align-items-center gap-5">
                            <div class="mb-2 text-white fw-bold">Tipologie per il tuo Ristorante:*</div>
                            <div class="my-3">
                                @foreach ($types as $type)
                                    <input type="checkbox" name="types[]" value="{{ $type->id }}" class="form-check-input mx-2 tipologieClassJS "
                                            {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                    <label for="" class="form-check-label text-white fw-bold">{{ $type->name }}</label>
                                @endforeach
                                
                                <div id="typeMessage" class="error-message"></div>
                                @error('types')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                    </div>

                           
                            <div class="mb-4 row col-md-6 offset-md-4 d-flex justify-content-center align-items-center">
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                    <button type="submit" id="submitBtn" class="f-d-button">
                                        {{ __('Registrati') }}
                                    </button>
                                    </div>
                            </div>
                            <div class="text-white ">
                                        *Campi obbligatori
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