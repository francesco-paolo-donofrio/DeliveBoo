@extends('layouts.admin')

@section('title', 'Modifica prodotto: ' . $user_restaurant_products->name)

@section('content')
<div class="f-d-transparent-layer">
    <section class="container f-d-editform-container">
        <h2 class="gradientColor">Modifica prodotto <em>{{$user_restaurant_products->name}}</em></h2>
        <form class="text-secondary" action="{{ route('admin.products.update', $user_restaurant_products->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- NOME -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $user_restaurant_products->name) }}" maxlength="200">
                <!-- qui va il messaggio di errore del nome -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- IMMAGINE -->
                <div class=''>
                    <div class="media">
                        @if($user_restaurant_products->image)
                            <img class="shadow" width="150" src="{{asset('storage/' . $user_restaurant_products->image)}}"
                                alt="{{$user_restaurant_products->name}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="100" src="public/images/placeholder.png" alt="{{$user_restaurant_products->name}}"
                                id="uploadPreview">
                        @endif
                        <div class="mb-3">
                            <label for="image" class="form-label">Immagine</label>
                            <input type="file" accept="image/*"
                                class="form-control @error('image') is-invalid @enderror" id="uploadImage" name="image"
                                value="{{ old('image', $user_restaurant_products->image) }}" maxlength="255">
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
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" required>{{old('description', $user_restaurant_products->description)}}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PREZZO -->
                        <div id="priceForm" class="mb-3">
                            <label for="price" class="form-label">Prezzo</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price', $user_restaurant_products->price) }}" required>
                            <!-- qui va il messaggio di errore del prezzo -->
                            <span id="error-message" style="color: red; display: none;">Il prezzo non può essere
                                negativo!</span>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- BOTTONI -->
                        <div class="mb-3">
                            <button id="priceButton" type="submit" class="f-d-button-form-edit">Modifica</button>
                            <a class="f-d-button-form-reset" href="{{ route('admin.products.index') }}">Torna
                                indietro</a>
                        </div>
        </form>
    </section>
</div>



@endsection
@section('sidebarContent')
@include('partials.sidebar')

@endsection

