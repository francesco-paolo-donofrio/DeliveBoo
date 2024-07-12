@extends('layouts.admin')
@section('content')

<div class="d-flex align-items-center align-content-center">
   <img src="{{asset('images/logo_deliveboo.png')}}" alt="Logo Deliveboo"> 
   <h1 class="gradientColor text-center py-4">Deliveboo</h1>
</div>

<!-- Se hai bisogno di visualizzare i dettagli dei prodotti -->
@if($lead->order->orderProducts)
    <h2>Dettagli del prodotto</h2>
    @foreach($lead->order->orderProducts as $product)
        <p>Prodotto: {{ $product->product_name }}</p>
        <p>Quantità: {{ $product->quantity }}</p>
        <p>Prezzo unitario: {{ $product->unit_price }} €</p>
    @endforeach
@endif

<p>Nome: {{ $lead->order->customer_name }}</p>
<p>Cognome: {{ $lead->order->customer_surname }}</p>
<p>Email: {{ $lead->order->customer_email }}</p>
<p>Numero di telefono: {{ $lead->order->customer_phone }}</p>
<p>Indirizzo di consegna: {{ $lead->order->customer_address }}</p>

@endSection


