@extends('layouts.admin')

@section('content')


@if(session()->has('deleted'))
    <div class="alert alert-danger">{{session()->get('deleted')}}</div>
    @endif



<h1 class="gradientColor text-center"><em>Menù </em><strong>{{$user->restaurant->name}}</strong></h1>

<div class="d-flex align-content-center align-items-center justify-content-between ms-2 mt-3">

<a href="{{route('admin.products.create')}}" title="Create" class="text-black px-2"><button class="f-d-button-form-edit">Aggiungi prodotto</button></a>
</div>



<table class="f-d-table">
    <thead>
        <tr>
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
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td> 
            @if ($product->visible == 0)
            <td>No</td>
            @else ($product->visible == 1)
            <td>Si</td>
            @endif

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