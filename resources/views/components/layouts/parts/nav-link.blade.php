@props(['route', 'active'])

@php
    $class = ($active ?? false) ? 'active' : '';
@endphp

<li>
    <a href="{{ $route ?? '#' }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
</li>
