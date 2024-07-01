<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="f-d-wrapper">


        <div class="f-d-content">
            <div class="f-d-header">
                <!-- Left Side Of Navbar -->
                <div class="d-flex align-items-center justify-content-start">
                    <button class="f-d-back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left fs-4"
                            style="color: #edd6b6;"></i></button>
                    <button class="f-d-back-button" onclick="goForward()"><i
                            class="fa-solid fa-arrow-left fa-rotate-180 fs-4" style="color: #edd6b6;"></i></button>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav d-flex flex-row gap-3">
                    <!-- <li class="nav-item text-center search-container d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-magnifying-glass f-d-li-unique" id="search-icon"></i>
                        <input type="text" id="search-bar" placeholder="Search...">
                    </li> -->
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item text-center">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-user"></i>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item text-center bounce-title">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right f-d-bg-green " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('admin') }}">{{__('Admin')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
                <div>
                    @yield('sidebarContent')
                </div>
            <main class="f-d-main">
                @yield('content') 
            </main>
        </div>


        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->

</body>

</html>

<script>
    function goBack() {
        window.history.back();
    }

    function goForward() {
        window.history.forward();
    }

</script>