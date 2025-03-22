@props(['route', 'active'])

@php
    // Convert the simple route name to a fully localized URL
    $localizedUrl = App\Helpers\LocalizationHelper::localizedRoute($route);

    // Determine if this route is active
    $isActive = App\Helpers\LocalizationHelper::isActiveRoute($active ?? $route);

    // Set active class if needed
    $class = $isActive ? 'active' : '';
@endphp

<li>
    <a href="{{ $localizedUrl }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
</li>
