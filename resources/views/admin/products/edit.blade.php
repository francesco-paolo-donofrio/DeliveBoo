@extends('layouts.admin')

@section('title', 'Modifica prodotto: ' . $product->name)

@section('content')
<div class="f-d-transparent-layer">
    <section class="container f-d-editform-container">
        <h2 class="gradientColor">Modifica prodotto  <em>{{$product->name}}</em></h2>
        <form class="text-secondary" action="{{ route('admin.products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- NOME -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $product->name) }}" maxlength="200">
                <!-- qui va il messaggio di errore del nome -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- IMMAGINE -->
                <div class=''>
                    <div class="media">
                        @if($product->image)
                            <img class="shadow" width="150" src="{{asset('storage/' . $product->image)}}"
                                alt="{{$product->name}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="100" src="" alt="{{$product->name}}" id="uploadPreview">
                        @endif
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
                        <!-- DESCRIZIONE -->
                        <div class="mb-3">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" required>{{old('description', $product->description)}}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PREZZO -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Prezzo</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price', $product->price) }}" required>
                            <!-- qui va il messaggio di errore del prezzo -->
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- BOTTONI -->
                        <div class="mb-3">
                            <button type="submit" class="f-d-button-form-edit">Modifica</button>
                            <button type="button" class="f-d-button-form-reset" onclick="resetForm()">Ripristina</button>
                            <button class="f-d-button-form-delete"><a class="text-decoration-none text-white" href="{{ route('admin.products.index') }}">Torna indietro</a></button>
                        </div>
        </form>
    </section>
</div>



@endsection
@section('sidebarContent')
@include('partials.sidebar')

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Definisce i valori originali dei campi
        const originalName = "{{ old('name', $product->name) }}";
        const originalImage = "{{ old('image', $product->image) }}";
        const originalDescription = "{{ old('description', $product->description) }}";
        const originalPrice = "{{ old('price', $product->price) }}";

        // Funzione per ripristinare i campi del form
        window.resetForm = function () {
            document.getElementById('name').value = originalName;
            document.getElementById('description').value = originalDescription;
            document.getElementById('image').value = originalImage;
            document.getElementById('price').value = originalPrice;

        };
    })
</script>