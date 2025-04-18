@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($title)
            {{ config('app.name') . ' - ' . $title }}
        @else
            {{ config('app.name') }}
        @endisset
    </title>

    <link rel="stylesheet" href="{{ asset('css/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
</head>
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div id="kt_app_root" class="d-flex flex-column flex-root app-root">
        <div id="kt_app_page" class="app-page flex-column flex-column-fluid">
            <!-- Header -->
            <x-layouts.parts.admin-header />
            <div id="kt_app_wrapper" class="app-wrapper flex-column flex-row-fluid">
                <!-- Sidebar -->
                <x-layouts.parts.sidebar />
                <!-- Main content -->
                <div id="kt_app_main" class="app-main flex-column flex-row-fluid">
                    <div class="d-flex flex-column flex-column-fluid">
                        <!-- Toolbar -->
                        <x-layouts.parts.toolbar title="{{ $title }}" />
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                {{ $slot }}

                                <!-- Alert -->
                                <x-alert />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <x-icon variant="arrow-up" />
    </div>

    <script src="{{ asset('js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    @yield('scripts')
</body>
</html>
