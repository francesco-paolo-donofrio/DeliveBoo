@extends('layouts.admin')

@section('title', 'Modifica prodotto: ' . $user_restaurant_products->name)

@section('content')

<div class="f-d-bg-login-register">
    
    <section class="container f-d-form-edit-create">
        <h2 class="text-white fw-bold">Modifica prodotto <em>{{$user_restaurant_products->name}}</em></h2>
        <form class="text-secondary" action="{{ route('admin.products.update', $user_restaurant_products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- NOME -->
            <div class="mb-3">
                <label for="name" class="form-label text-white fw-bold">Nome*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"

                    value="{{ old('name', $user_restaurant_products->name) }}" maxlength="200">
                    {{-- FE VALIDATION: messaggio tramite JS --}}
                    
                        <div id="nameMessage" class="error-message"></div>
                    

                <!-- BE VALIDATION: qui va il messaggio di errore del nome -->
                
                <!-- qui va il messaggio di errore del nome -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- IMMAGINE -->

                    <div class="media my-3">                                
                        @if($user_restaurant_products->image)
                            <img class="shadow" width="150" src="{{asset('storage/' . $user_restaurant_products->image)}}"
                                alt="{{$user_restaurant_products->name}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="100" src="public/images/placeholder.png" alt="{{$user_restaurant_products->name}}"
                                id="uploadPreview">
                        @endif
                    </div>                   
                        <div class="mb-3">
                            <label for="image" class="form-label text-white fw-bold">Immagine</label>
                            <input type="file" accept="image/*"
                                class="form-control @error('image') is-invalid @enderror" id="uploadImage" name="image"
                                value="{{ old('image', $user_restaurant_products->image) }}" maxlength="255">
                                {{-- FE VALIDATION: messaggio tramite JS --}}
                            <div id="imgMessage" class="error-message"></div>
                            <!-- qui va il messaggio di errore dell'immagine -->
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- div dove prendere spunto per fixare immagine -->
                        <!-- <div class="w-50">
                        <label for="img" class="form-label">Immagine*</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="img"
                            name="img">
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                            </div> -->


                    

                        <!-- DESCRIZIONE -->
                        <div class="mb-3">
                            <label for="description" class="form-label text-white fw-bold">Descrizione*</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" required>{{old('description', $user_restaurant_products->description)}}</textarea>
                                 <div id="descriptionMessage" class="error-message"></div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PREZZO -->
                        <div id="priceForm" class="mb-3">
                            <label for="price" class="form-label text-white fw-bold">Prezzo*</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price', $user_restaurant_products->price) }}" required>
                            <!-- qui va il messaggio di errore del prezzo -->              
                             <div id="priceMessage" class="error-message"></div>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- VISIBILITA' -->
            <div id="visible" class="mb-3 text-secondary">
                <div for="visible" class="text-white fw-bold mb-2">Vuoi mostrare il prodotto sul menù?*</div>
                <div class="">
                    <div>
                        <input id="visible-1" name="visible" class="form-check-input me-1" type="radio" value="1" aria-label="Radio button for following text input" @if ($user_restaurant_products->visible == 1) : checked @endif>
                        <label for="visible-1" class="form-label text-white">Sì, mostra il prodotto sul menù</label>
                    </div>
                    <div>
                        <input id="visible-0" name="visible" class="form-check-input me-1" type="radio" value="0" aria-label="Radio button for following text input" @if ($user_restaurant_products->visible == 0) : checked @endif>
                        <label for="visible-0" class="form-label text-white">No, non mostrare il prodotto sul menù</label>
                    </div>
                </div>
                <div id="visibleMessage" class="text-black"></div>
                <!-- qui va il messaggio di errore del prezzo -->
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

                    <!-- BOTTONI -->
                    <div class="mb-3">
                        <button id="submitBtn" type="submit" class="f-d-button-form-edit">Modifica</button>
                    </div>
                    <div class="text-white fw-bold"><span>* Campi obbligatori</span></div>
            </div>
        </form>
    </section>
</div>



@endsection
@section('sidebarContent')
@include('partials.sidebar')

@endsection

