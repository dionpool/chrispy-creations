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

    @vite(['public/css/style.css'])
</head>
<body class="guest-layout">
    <main class="app-root">
        <div class="app-row">
            <div class="app-content">
                <div class="card">
                    <div class="card-content">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/35fc96c928.js" crossorigin="anonymous"></script>
</body>
</html>
