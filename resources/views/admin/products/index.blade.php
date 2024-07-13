@extends('layouts.admin')

@section('content')


@if(session()->has('deleted'))
    <div class="alert alert-danger">{!! session()->get('deleted') !!}</div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">{!! session()->get('message') !!}</div>
@endif

@if($user->restaurant->products->isNotEmpty())
<h1 class="f-d-primary-color text-center"><em>Menù </em><strong>{{$user->restaurant->name}}</strong></h1>

<div class="d-flex align-content-center align-items-center justify-content-between ms-2 mt-3">

<a href="{{route('admin.products.create')}}" title="Create" class="text-black px-2"><button class="f-d-button-form-edit">Aggiungi piatto</button></a>
</div>

@if ($totalProductsCount)
    <p class="text-secondary fw-bold ps-3 pt-4">Piatti disponibili: {{ $totalProductsCount }}</p>
@else ($totalProductsCount < 1)
    <p class="text-warning ps-3 pt-4 fw-bold">Nessun piatto disponibile</p>
@endif

<table class="f-d-table">
    <thead>
        <tr>
            <th scope="col">Immagine</th>
            <th scope="col">Nome</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Visibilità</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($user->restaurant->products as $product)
        <tr>
            <td><img src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}" class="product-image ps-1"></td>
            <td class="product-name ps-2">{{$product->name}}</td>
            <td class="text-end pe-3">{{$product->price}} &euro;</td> 
            @if ($product->visible == 0)
            <td class="text-end pe-3"><i class="fs-3 fa-regular fa-circle-xmark" style="color: #ff2600;"></i></td>
            @else ($product->visible == 1)
            <td class="text-end pe-3"><i class="fs-3 fa-regular fa-circle-check" style="color: #ffffff;"></i></i></td>
            @endif

            <td class="text-end pe-3">
                {{-- <a href="{{route('admin.products.show', $product->id)}}" title="Show" class="text-black px-2"><i class="fa-solid fa-eye" style="color: #758C20;"></i></a> --}}
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
@else
<p id="no-orders-warning" class="fs-5 text-light ps-3 p-5 fw-bold mt-5">Inserisci il primo piatto per visualizzare il menù</p>
<a href="{{route('admin.products.create')}}" title="Create" class="text-black px-2"><button class="f-d-button-form-edit">Aggiungi piatto</button></a>
@endif
@include('partials.deleteModal')
{{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}
</section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection
