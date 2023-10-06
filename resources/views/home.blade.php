<x-layouts.app title="Design with a bite!">
    <div class="grid-container">
        @foreach($projects as $project)
            <a href="{{ route('project.single', $project->slug) }}" class="grid-item {{ $project->size }}">
                <img src="storage/{{ $project->thumbnail }}" alt="{{ $project->title }}">
                <div class="overlay">
                    <h2>{{ $project->title }}</h2>
                    <hr>
                    <span>{{ $project->category->title }}</span>
                </div>
            </a>
        @endforeach
    </div>
</x-layouts.app>
