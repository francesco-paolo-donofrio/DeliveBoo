@extends('layouts.admin')

{{-- sezioni da condizionare in base alla presenza di user -> restaurant!!! --}}
@section('content')
<h1>{{ $user_restaurant->name }}</h1>
<p>{{ $user_restaurant->address }}</p>
<p>{{ $user_restaurant->phone }}</p>

<h1>Products</h1>


@endsection