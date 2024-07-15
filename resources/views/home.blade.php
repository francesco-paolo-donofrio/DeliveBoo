@extends('layouts.app')
@section('content')
<section class="home">
    <div class="container f-d-color-text-2 text-center">
        <img src="{{asset('images/logo_deliveboo.png')}}" class="f-d-remove" alt="deliveboo-logo">
        <h1>Pannello amministratore</h1>
        <h3>Effettua la registrazione per creare il tuo ristorante e gestire i tuoi ordini</h3>
        <div class="nav-item text-center bounce-title">
            <a class="f-d-button-form-edit" href="{{ route('register') }}"><h5>Registrati <i class="fas fa-user-plus fs-4 p-2"></i></h5>
            </a>
        </div>
        <h4>oppure, se hai già un account, effettua il login</h4>
        <div class="nav-item text-center bounce-title">
            <a class="f-d-button-form-edit" href="{{ route('login') }}"><h5>Login <i class="fas fa-user fs-4 p-2"></i></h5>
            </a>
        </div>
    </div>

</section>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection