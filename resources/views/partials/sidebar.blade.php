<div class="f-d-sidebar">
    <div class="f-d-nav-vertical">
        <a class="navbar-brand f-d-logo-container" href="{{ route('admin.dashboard') }}">
            <img src="{{asset('images/logo_deliveboo.png')}}" class="f-d-image-logo" alt="Logo">
        </a>
        <div>
            <div>
                @guest
                
                @else
                <a href="{{ route('admin.dashboard') }}" class="d-flex justify-content-start align-items-center">
                    <i class="fs-4 fa-solid fa-table-columns"></i>
                    <em class="f-d-display-none">Dashboard</em>
                </a>
                <a href="{{ route('admin.products.index') }}" class="d-flex justify-content-start align-items-center">
                    <i class="fs-4 fa-solid fa-utensils"></i>
                    <em class="f-d-display-none">Piatti/Menù</em>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="d-flex justify-content-start align-items-center">
                    <i class="fs-4 fa-solid fa-clipboard-check"></i>
                    <em class="f-d-display-none">Ordini</em>
                </a>
                @endguest
            </div>
        </div>
    </div>
</div>