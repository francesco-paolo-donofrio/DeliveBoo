@extends('layouts.admin')

{{-- sezioni da condizionare in base alla presenza di user -> restaurant!!! --}}
@section('content')
@if (!$user_restaurant)
<section>
  <div class="container">
    <h1 class="text-center">Effettua la registrazione</h1>
    <form action="{{route('admin.restaurants.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome">
      </div>
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <div class="mb-3">
        <label for="address" class="form-label">Indirizzo</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Inserisci l'indirizzo">
      </div>
      @error('address')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <div class="mb-3">
        @if(!$user_restaurant)
              <img class="shadow" width="150" src="{{asset('images/placeholder.png')}}" alt="" id="uploadPreview">        
        @else
              <img class="shadow" width="150" src="{{asset('storage/post_images/' . $user_restaurant->image)}}" alt="{{$user_restaurant->name}}" id="uploadPreview">
        @endif
            
        <label for="image" class="form-label">Immagine</label>
        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="uploadImage"
          name="image" value="{{ old('image') }}" maxlength="255">
        @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Inserisci la descrizione">
      </div>
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="vat" class="form-label">Partita IVA</label>
        <input type="text" class="form-control" id="vat" name="vat" placeholder="Inserisci la Partita IVA">
      </div>
      @error('vat')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <button type="submit" class="btn btn-success">Invia</button>
    </form>





@else

<h1><i class="fa-solid fa-utensils"></i>{{$user_restaurant->name }}</h1>
<p><i class="fa-solid fa-location-dot"></i>{{ $user_restaurant->address }}</p>
<p><i class="fa-solid fa-phone"></i>{{ $user_restaurant->phone }}</p>

<h1>Piatti</h1>

<ul>
    @foreach ($user_products as $item)
        <li>{{$item->name}}</li>
    @endforeach

</ul>
<a href="{{route('admin.products.create')}}" title="Create" class="text-black px-2"><button class="f-d-button-view">Aggiungi prodotto</button></a>
@endif

@endsection

@section('sidebarContent')
@include('partials.sidebar')
@endsection