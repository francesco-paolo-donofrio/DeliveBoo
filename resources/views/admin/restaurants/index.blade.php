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
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Insert a name">
      </div>
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Insert address">
      </div>
      @error('address')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <div class="mb-3">
        <!-- <img id="uploadPreview" width="100" src="/images/placeholder.jpg" class="p-2"> -->
        <label for="image" class="form-label">Image</label>
        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="uploadImage"
          name="image" value="{{ old('image') }}" maxlength="255">
        @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Insert description">
      </div>
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="vat" class="form-label">vat</label>
        <input type="text" class="form-control" id="vat" name="vat" placeholder="Insert vat">
      </div>
      @error('vat')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <button type="submit" class="btn btn-success">Submit</button>
    </form>





@else

<h1>{{ $user_restaurant->name }}</h1>
<p>{{ $user_restaurant->address }}</p>
<p>{{ $user_restaurant->phone }}</p>

<h1>Products</h1>

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