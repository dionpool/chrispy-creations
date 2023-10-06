@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @isset($title)
            {{ config('app.name') . ' - ' . $title }}
        @else
            {{ config('app.name') }}
        @endisset
    </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    @vite(['public/css/style.css'])
</head>
<body>
    @if(request()->is('projects/*'))

    @else
        <x-layouts.parts.header />
    @endif

    {{ $slot }}

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/35fc96c928.js" crossorigin="anonymous"></script>
    @vite(['public/js/app.js'])
</body>
</html>
