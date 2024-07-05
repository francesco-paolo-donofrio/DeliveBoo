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
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="d-flex justify-content-start align-items-center">
                    <i class="fs-4 fa-solid fa-utensils"></i>
                    Piatti/Menù
                </a>
                <a href="#" class="d-flex justify-content-start align-items-center">
                    <i class="fs-4 fa-solid fa-clipboard-check"></i>
                    Ordini
                </a>
                <a href="#" class="d-flex justify-content-start align-items-center">
                    <i class="fs-4 fa-solid fa-chart-line"></i>
                    Dati e grafici
                </a>
                @endguest
            </div>
        </div>
    </div>
</div>