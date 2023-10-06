<div class="card card-flush mt-6 mt-xl-9">
    @if(isset($title) or isset($toolbar))
        <div class="card-header mt-5">
            @isset($title)
                <div class="card-title flex-column">
                    {{ $title }}
                </div>
            @endisset

            @isset($toolbar)
                <div class="card-toolbar my-1">
                    <div class="me-6 my-1">
                        {{ $toolbar }}
                    </div>
                </div>
            @endisset
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>
</div>
