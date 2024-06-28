@extends('layouts.admin')
@section('title', $product->name)
@section('content')

<section>
    <div div class="py-4 ps-4">
        <h1>{{$product->name}}</h1>
        <!-- Qui va immagine con src in asset  -->
        <!-- <img src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}" -->
        <p>{{$product->description}}</p>
        <div>
           <!--  Qui va la rotta di modifica con relativo bottone  -->
        </div>
</div>
</section>
@endsection