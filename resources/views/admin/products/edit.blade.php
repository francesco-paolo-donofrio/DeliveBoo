@extends('layouts.admin')

@section('title', 'Modifica prodotto: ' . $product->name)

@section('content')
<div class="f-d-transparent-layer">
    <section class="container f-d-editform-container">
        <h2 class="gradientColor">Modifica prodotto <em>{{$product->name}}</em></h2>
        <form class="text-secondary" action="{{ route('admin.products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- NOME -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $product->name) }}" maxlength="200">
                    {{-- FE VALIDATION: messaggio tramite JS --}}
                    <div id="nameMessage"></div>

                <!-- BE VALIDATION: qui va il messaggio di errore del nome -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- IMMAGINE -->
                    <div class="media my-3">
                        @if($product->image)
                            <img class="shadow" width="150" src="{{asset('storage/' . $product->image)}}"
                                alt="{{$product->name}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="100" src="public/images/placeholder.png" alt="{{$product->name}}"
                                id="uploadPreview">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" accept="image/*"
                            class="form-control @error('image') is-invalid @enderror" id="uploadImage" name="image"
                            value="{{ old('image', $product->image) }}" maxlength="255">
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
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" required>{{old('description', $product->description)}}</textarea>
                        <div id="descriptionMessage"></div>

                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- PREZZO -->
                    <div id="priceForm" class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                            id="price" name="price" value="{{ old('price', $product->price) }}" required>
                        <div id="priceMessage"></div>

                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- BOTTONI -->
                    <div class="mb-3">
                        <button id="submitBtn" type="submit" class="f-d-button-form-edit">Modifica</button>
                        <a class="f-d-button-form-reset" href="{{ route('admin.products.index') }}">Torna indietro</a>
                    </div>
                    
            </div>
        </form>
    </section>
</div>



@endsection
@section('sidebarContent')
@include('partials.sidebar')

@endsection

