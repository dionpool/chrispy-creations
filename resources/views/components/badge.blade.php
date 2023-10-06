@props(['variant', 'class'])

@if($variant === 'published')
    <span class="badge badge-light-success fw-bold px-4 py-3">
        {{ $slot }}
    </span>
@endif

@if($variant === 'concept')
    <span class="badge badge-light-info fw-bold px-4 py-3">
        {{ $slot }}
    </span>
@endif

@if($variant === 'hidden')
    <span class="badge badge-light-warning fw-bold px-4 py-3">
        {{ $slot }}
    </span>
@endif
