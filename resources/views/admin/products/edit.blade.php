@extends('layouts.admin')

@section('title', 'Modifica prodotto: ' . $product->name)

@section('content')
<section class="container f-d-editform-container f-d-transparent-layer-edit">
    <h2 class="text-secondary">Modifica prodotto {{$product->name}}</h2>
        <form class="text-secondary" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                    <img class="shadow" width="150" src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}" id="uploadPreview">
                    @else
                    <img class="shadow" width="100" src="" alt="{{$product->name}}" id="uploadPreview">
                    @endif
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="uploadImage"
                    name="image" value="{{ old('image', $product->image) }}" maxlength="255">
                    <!-- qui va il messaggio di errore dell'immagine -->
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- DESCRIZIONE -->
            <div class="mb-3">
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required >{{old('description', $product->description)}}
              </textarea>
              @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- PREZZO -->
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $product->price) }}" required>
                <!-- qui va il messaggio di errore del prezzo -->
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- BOTTONI -->
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Modifica</button>
                <button type="reset" class="btn btn-secondary">Annulla</button>
            </div>
        </form>
    </section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection