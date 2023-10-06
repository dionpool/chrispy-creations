<div id="kt_app_header" class="app-header">
    <div id="kt_app_header_container" class="app-container container-fluid d-flex align-items-stretch justify-content-between">
        <!-- Logo -->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('dashboard') }}" class="d-lg-none">
                <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }} logo" class="h-30px">
            </a>
        </div>

        <!-- Header wrapper -->
        <div id="kt_app_header_wrapper" class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!-- Return to home -->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch">
                <div id="kt_app_header_menu" class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" data-kt-menu="true">
                    <div class="menu-item here show menu-here-bg me-0 me-lg-2">
                        <a href="{{ route('home') }}" class="menu-link">
                            <span class="menu-title">Home</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="app-navbar flex-shrink-0">
                <!-- Profile dropdown -->
                <div id="kt_header_user_menu_toggle" class="app-navbar-item ms-1 ms-md-3">
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                         data-kt-menu-trigger="{ default: 'click', lg: 'hover' }" data-kt-menu-attach="parent"
                         data-kt-menu-placement="bottom-end">
                        <img src="{{ asset('images/avatars/profile-pic.jpg') }}" alt="Avatar of {{ Auth::user()->name }}">
                    </div>
                    <!-- Profile content -->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{ asset('images/avatars/profile-pic.jpg') }}" alt="Avatar of {{ Auth::user()->name }}">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold d-flex align-items-center fs-5">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <span class="fw-semibold text-muted fs-7">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Mijn Profiel</a>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Instellingen</a>
                        </div>
                        <div class="separator my-2"></div>
                        <form method="POST" action="{{ route('login.destroy') }}" class="menu-item px-5">
                            @csrf

                            <x-button variant="logout">Uitloggen</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
