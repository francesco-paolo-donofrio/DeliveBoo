@extends('layouts.admin')
@section('title', $product->name)
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
@endif
<div class="py-4 ps-4 text-secondary">
    <h1>{{$product->name}}</h1>
    <div class="showimage">
        <img src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
    </div>
    <p>{{$product->description}}</p>

    <small>Prezzo: {{$product->price}}</small>
</div>
<div class="ms-2 mt2">
    <!--  Qui va eventualmente la rotta di modifica con relativo bottone  -->
    <a href="{{route('admin.products.edit', $product->id)}}" title="Edit" class="text-black px-2"><button
            class="f-d-button-form-edit">Modifica</button></a>
</div>


</section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection