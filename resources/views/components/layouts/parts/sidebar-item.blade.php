@props(['route' => 'home', 'active', 'icon'])

@php
    $class = ($active ?? false) ? 'menu-item here' : 'menu-item';
@endphp

<div {{ $attributes->merge(['class' => $class]) }}>
    <a href="{{ route($route) }}" class="menu-link">
           <span class="menu-icon">
              <x-icon variant="{{ $icon }}" />
           </span>
        <span class="menu-title">{{ $slot }}</span>
    </a>
</div>
