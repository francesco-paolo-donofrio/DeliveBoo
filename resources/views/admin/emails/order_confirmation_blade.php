@extends('layouts.admin')

@section('content')

<h1>Ordine effettuato! Ecco qui un riepilogo:</h1>
<p>Prodotto: {{ $lead->order->product_name }}</p> <!-- verificare come recuperare il prodotto -->
<p>Quantità: {{ $lead->order->quantity }}</p> <!-- verificare come recuperare la quantità -->
<p>Prezzo: {{ $lead->order->total_price }}</p> <!-- verificare come recuperare il prezzo -->
<p>Nome cliente: {{ $lead->order->customer_name }}</p>
<p>Email cliente: {{ $lead->order->customer_email }}</p>
<p>Numero di telefono: {{ $lead->order->customer_phone }}</p>
<p>Indirizzo di consegna: {{ $lead->order->customer_address }}</p>

@endSection


