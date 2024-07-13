@extends('layouts.admin')

@section('content')

<div class="container">
@if($orders->isNotEmpty())
<h1 class="gradientColor text-center py-4">Ordini</h1>
    @if ($totalOrdersCount)
    <p class="text-secondary fw-bold ps-3 pt-4">Ordini disponibili: {{ $totalOrdersCount }}</p>
@else ($totalOrdersCount < 1)
    <p class="text-secondary ps-3 pt-4 fw-bold">Ancora nessun ordine disponibile</p>
@endif

    <table class="f-d-table">
        <thead>
    <table class="f-d-table">
        <thead class="f-d-table-header">
            <tr>
                <th>Nome cliente</th>
                <th>Email cliente</th>
                <th>Indirizzo cliente</th>
                <th>Totale</th>
                <th>Data e ora</th>
                <th>Dettaglio Ordine</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                   
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>  
                    <td>{{ $order->customer_address }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->formatted_date }}</td>

                    <td class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="f-d-button f-d-primary-color fw-bold">Visualizza</a>

                   
                        

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p id="no-orders-warning" class="fs-5 text-light ps-3 p-5 fw-bold mt-5">Il resoconto sarà disponibilie dopo il primo ordine</p>
    @endif
    </table>
   <!-- serve eventualmente per la paginazione -->
</div>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection