@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Ordini</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nome cliente</th>
                <th>Email cliente</th>
                <th>Indirizzo cliente</th>
                <th>Totale</th>
                <th>Data ordine</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                   
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>  
                    <td>{{ $order->customer_address }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Visualizza</a>
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