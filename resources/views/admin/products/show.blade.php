@extends('layouts.admin')
@section('title', $user_restaurant_products->name)
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
@endif
<div class="py-4 ps-4 text-secondary">
    <h1>{{$user_restaurant_products->name}}</h1>
    <div class="showimage">
        <img src="{{asset('storage/' . $user_restaurant_products->image)}}" alt="{{$user_restaurant_products->name}}">
    </div>
    <p>{{$user_restaurant_products->description}}</p>

    <small>Prezzo: {{$user_restaurant_products->price}}</small>
</div>
<div class="ms-2 mt2">
    <!--  Qui va eventualmente la rotta di modifica con relativo bottone  -->
    <a href="{{route('admin.products.edit', $user_restaurant_products->id)}}" title="Edit" class="text-black px-2"><button
            class="f-d-button-form-edit">Modifica</button></a>
</div>


</section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection