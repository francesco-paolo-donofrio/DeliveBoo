@extends('layouts.admin')
@section('content')

<h1>Ordine effettuato, ecco un riepilogo</h1>
<!-- Se hai bisogno di visualizzare i dettagli dei prodotti -->
@if($lead->order->orderProducts)
    <h2>Dettagli di acquisto</h2>
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


