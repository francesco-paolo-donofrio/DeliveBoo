@extends('layouts.admin')

@section('content')
<section>
<h2 class="f-d-color-primary p-4 fw-bold text-center">Riepilogo Ordine<em></em></h2>
<div>
        <p class="fs-5 pt-3 ps-3 fw-bold text-secondary">Ordine ricevuto giorno: {{ $order->formatted_date }}</p>
    </div>
<table class="f-d-table">
        <thead>
            <tr class="f-d-table-header">
                <th>Nome Piatto</th>
                <th>Quantità</th>
                <th>Prezzo Unitario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->pivot->product_name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td class="text-end">{{ $product->pivot->unit_price }} &euro;</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex align-content-center justify-content-between">
        <div class="card ms-2 ps-3 my-4 fw-bold order-details fs-5">
            <h2 class="pt-3">Dettaglio cliente</h2>
            <p class="pt-3">Nome: {{ $order->customer_name }}</p>
            <p>Cognome: {{ $order->customer_surname }}</p>
            <p>Email: {{ $order->customer_email }}</p>
            <p>Indirizzo: {{ $order->customer_address }}</p>
            <p>Numero di telefono: {{ $order->customer_phone }}</p>
        </div>
        <div class="order-details card ps-3 my-4 mx-4 fw-bold">
            <p class="fs-2 ps-3 pt-2 fw-bold text-center pt-5">Totale corrisposto: 
            </p>
            <p class="text-center pt-5 fs-3">{{ $order->total_price }} &euro;</p>
         </div>
    </div>
    
   
    
</section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection