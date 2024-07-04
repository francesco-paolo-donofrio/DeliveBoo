@extends('layouts.app')

@section('content')
<div class="f-d-bg-login-register">
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
                <div class="f-d-card">
                    <h1 class="card-header mb-3">{{ __('Accedi') }}</h1>

                    <div class="f-d-card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <div id="emailMessage"></div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row ">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                        <div id="pswMessage"></div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input bg-gray" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ricordami') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-8 offset-md-4 d-flex">
                                    <button type="submit" id="submitBtn" class="btn f-d-button">
                                        {{ __('Accedi') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-black" href="{{ route('password.request') }}">
                                            {{ __('Password dimenticata?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sidebarContent')
@include('partials.sidebar')
@endsection