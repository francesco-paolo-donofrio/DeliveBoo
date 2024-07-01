@extends('layouts.admin')

@section('content')


@if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif

<div class="d-flex align-content-center align-items-center justify-content-between ms-2 mt-3">
<h1 class="gradientColor text-center">Tutti i prodotti di {{$user->restaurant->name}}</h1> 
<a href="{{route('admin.products.create')}}" title="Create" class="text-black px-2"><button class="btn btn-success">Aggiungi prodotto</button></a>
</div>

<table class="f-d-table">
    <thead>
        <tr>
            <th scope="col">Immagine</th>
            <th scope="col">Id Prodotto</th>
            <th scope="col">Id Ristorante</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Visibilità</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($user->restaurant->products as $product)
        <tr>
            <td>{{$product->image}}</td>
            <td>{{$product->id}}</td>
            <td>{{$product->restaurant_id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->visible}}</td>
            <td>
                <a href="{{route('admin.products.show', $product->id)}}" title="Show" class="text-black px-2"><i class="fa-solid fa-eye" style="color: #758C20;"></i></a>
                <a href="{{route('admin.products.edit', $product->id)}}" title="Edit" class="text-black px-2"><i class="fa-solid fa-pen" style="color: white;"></i></a>
                <form action="{{route('admin.products.destroy', $product->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $product->name }}" data-item-id = "{{ $product->id }}">
                    <i class="fa-solid fa-trash" style="color: #e70d18;"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

{{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}
</section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection