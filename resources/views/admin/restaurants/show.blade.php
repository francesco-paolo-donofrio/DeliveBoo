@extends('layouts.admin')

{{-- sezioni da condizionare in base alla presenza di user -> restaurant!!! --}}
@section('content')
    <h1>{{ $restaurant->name }}</h1>
    <p>{{ $restaurant->address }}</p>
    <p>{{ $restaurant->phone }}</p>
@endsection
