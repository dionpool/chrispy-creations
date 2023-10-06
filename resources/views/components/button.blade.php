@props(['variant', 'class', 'target'])

@if($variant === 'primary')
    <button type="submit" class="btn btn-primary {{ $class ?? '' }}">
        {{ $slot }}
    </button>
@endif

@if($variant === 'logout')
    <button type="submit" class="btn btn-logout {{ $class ?? '' }}">
        {{ $slot }}
    </button>
@endif

@if($variant === 'auth')
    <button type="submit" class="btn btn-auth {{ $class ?? '' }}">
        {{ $slot }}
    </button>
@endif

@if($variant === 'danger')
    <button type="submit" class="btn btn-danger {{ $class ?? '' }}">
        {{ $slot }}
    </button>
@endif

@if($variant === 'admin-modal')
    <button type="button" class="btn-link menu-link px-3" data-bs-toggle="modal" data-bs-target="#{{ $target }}">
        {{ $slot }}
    </button>
@endif
