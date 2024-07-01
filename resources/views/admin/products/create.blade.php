@extends('layouts.admin')

@section('title', 'Aggiungi un nuovo prodotto')

@section('content')
    <section class="container pt-4">
        <h2 class="text-secondary">Aggiungi un nuovo prodotto</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <!-- NOME -->
            <div class="mb-3 text-secondary">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" minlength="3" maxlength="200" required>
                <!-- qui va il messaggio di errore del nome -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- IMMAGINE -->
            <div class="mb-3 text-secondary">
                <img id="uploadPreview" width="100" src="">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="uploadImage"
                    name="image" value="{{ old('image') }}" maxlength="255" required>
                    <!-- qui va il messaggio di errore dell'immagine -->
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- DESCRIZIONE -->
            <div class="mb-3">
                <label class="text-secondary" for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>
                {{ old('description') }}
              </textarea>
              <!-- qui va il messaggio di errore della descrizione -->
              @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- PREZZO -->
            <div class="mb-3 text-secondary">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price') }}" required>
                <!-- qui va il messaggio di errore del prezzo -->
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- BOTTONI -->
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Crea</button>
                <button type="reset" class="btn btn-secondary">Annulla</button>
            </div>
        </form>
    </section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection