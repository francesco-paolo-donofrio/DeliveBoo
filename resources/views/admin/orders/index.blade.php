@extends('layouts.admin')

@section('content')
<div class="container">

    <h1>Ordini</h1>
    <table class="f-d-table">
        <thead>

    <h1 class="gradientColor text-center py-4">Ordini</h1>
    <table class="f-d-table">
        <thead class="f-d-table-header">

            <tr>
                <th>Nome cliente</th>
                <th>Email cliente</th>
                <th>Indirizzo cliente</th>
                <th>Totale</th>
                <th>Data ordine</th>
                <th>Status</th>
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
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>

                    <td class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="f-d-button f-d-primary-color fw-bold">Visualizza</a>

                   
                        

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->links() }} <!-- serve eventualmente per la paginazione -->
</div>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection