<x-layouts.app title="{{ $project->title }}">
    <header class="project-header">
        <div class="info">
            <button class="info-trigger" data-modal="project-info">
                <i class="fa-solid fa-info"></i>
            </button>
        </div>

        <div class="meta">
            <h1>{{ $project->title }}</h1>
            <hr>
            <span>{{ $project->category->title }}</span>
        </div>

        <div class="close">
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-close"></i>
            </a>
        </div>
    </header>

    <main class="project-content">
        <x-carousel :project="$project" />

        <section class="description">
            <p>{!! $project->description !!}</p>
        </section>
    </main>

    <x-modal>{!! $project->description !!}</x-modal>
</x-layouts.app>
