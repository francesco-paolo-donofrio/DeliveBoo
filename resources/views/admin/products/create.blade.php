@extends('layouts.admin')

@section('title', 'Aggiungi un nuovo prodotto')

@section('content')
<div class="f-d-bg-login-register">
    <section class="container f-d-form-edit-create">
        <h2 class="text-black">Aggiungi un nuovo prodotto</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <!-- NOME -->
            <div class="mb-3 text-secondary">
                <label for="name" class="form-label text-black">Nome*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" minlength="3" maxlength="200" required>
                    <div id="nameMessage" class="text-black"></div>
                <!-- qui va il messaggio di errore del nome -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- IMMAGINE -->
            @if($product->image)
                <img class="shadow" width="150" src="{{asset('storage/post_images/' . $product->image)}}"
                    alt="{{$product->name}}" id="uploadPreview">
            @else
                <img class="shadow" width="150" src="" alt="{{$product->name}}" id="uploadPreview">
            @endif

            <div class="mb-3 text-secondary">

                <label for="image" class="form-label text-black">Immagine*</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
                    id="uploadImage" name="image" value="{{ old('image') }}" maxlength="255" required>
                    <div id="imgMessage" class="text-black"></div>
                <!-- qui va il messaggio di errore dell'immagine -->
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- DESCRIZIONE -->
            <div class="mb-3">

                <label for="description" class="form-label text-black">Descrizione</label>              
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" required>{{ old('description') }}</textarea>
                <div id="descriptionMessage" class="text-black"></div>
                <!-- qui va il messaggio di errore della descrizione -->
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- PREZZO -->
            <div id="priceForm" class="mb-3 text-secondary">
                <label for="price" class="form-label text-black">Prezzo*</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price') }}" required>
                <div id="priceMessage" class="text-black"></div>
                <!-- qui va il messaggio di errore del prezzo -->
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- VISIBILITA' -->
            <div id="visible" class="mb-3 text-secondary">
                <div for="visible" class="text-black mb-2">Vuoi mostrare il prodotto sul menù?*</div>
                <div class="">
                    <div>
                        <input id="visible-1" name="visible" class="form-check-input me-1" type="radio" value="1" aria-label="Radio button for following text input">
                        <label for="visible-1" class="form-label text-black">Sì, mostra il prodotto sul menù</label>
                    </div>
                    <div>
                        <input id="visible-0" name="visible" class="form-check-input me-1" type="radio" value="0" aria-label="Radio button for following text input">
                        <label for="visible-0" class="form-label text-black">No, non mostrare il prodotto sul menù</label>
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
                <button type="submit" id="submitBtn" class="f-d-button-form-edit">Crea</button>

            </div>
            <div class="text-black"><span>* Campi obbligatori</span></div>
        </form>
    </section>
</div>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection