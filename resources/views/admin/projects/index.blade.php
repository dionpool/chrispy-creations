<x-layouts.admin title="Projecten">
    @section('breadcrumbs')
        {{ Breadcrumbs::render('projects') }}
    @endsection

    <x-admin.card>
        <x-slot name="title">
            <h3 class="fw-bold mb-1">Projecten</h3>
            <span class="fs-6 text-gray-400">Alle projecten van {{ config('app.name') }}.</span>
        </x-slot>

        <x-slot name="toolbar">
            <label for="category" class="d-none">Categorie:</label>
            <select name="category" id="category" data-control="select2" data-hide-search="true" class="w-175px form-select form-select-solid form-select-sm">
                <option value="all" selected>Alle Categorieën</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </x-slot>

        <div class="table-responsive">
            <table class="table table-row-bordered table-row-dashed gy-4 align-middle">
                <thead class="fs-7 text-gray-400 text-uppercase fw-bold">
                    <tr>
                        <th scope="col">Volgorde</th>
                        <th scope="col">Titel</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Omschrijving</th>
                        <th scope="col">Status</th>
                        <th scope="col">Acties</th>
                    </tr>
                </thead>
                <tbody id="sortable-projects" data-reorder-url="{{ route('project.reorder-projects') }}">
                @foreach($projects as $project)
                    <tr data-id="{{ $project->id }}"> <!-- Add data-id here -->
                        <td class="drag-handle cursor-move">
                            <x-icon variant="drag-drop" />
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-5 position-relative">
                                    <div class="symbol symbol-25px">
                                        <img src="/storage/{{ $project->thumbnail }}" class="object-fit-cover" alt="{{ $project->title }} thumbnail">
                                    </div>
                                </div>
                                {{ $project->title }}
                            </div>
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->category->title }}</td>
                        <td class="excerpt">{{ $project->description }}</td>
                        <td>
                            @if($project->status === 'published')
                                <x-badge variant="published">{{ $project->status }}</x-badge>
                            @elseif($project->status === 'concept')
                                <x-badge variant="concept">{{ $project->status }}</x-badge>
                            @elseif($project->status === 'hidden')
                                <x-badge variant="hidden">{{ $project->status }}</x-badge>
                            @endif
                        </td>
                        <td>
                            <x-dropdown>
                                <x-slot name="trigger">Acties</x-slot>
                                <x-dropdown-item>
                                    <a href="{{ route('project.single', $project->slug) }}" class="menu-link px-3" target="_blank">Bekijken</a>
                                </x-dropdown-item>
                                <x-dropdown-item>
                                    <a href="{{ route('project.edit', $project->id) }}" class="menu-link px-3">Bewerken</a>
                                </x-dropdown-item>
                                <x-dropdown-item>
                                    <x-button variant="admin-modal" target="deleteProject{{ $project->id }}">Verwijderen</x-button>
                                </x-dropdown-item>
                            </x-dropdown>
                        </td>
                    </tr>

                    <x-admin.modal :id="'deleteProject' . $project->id">
                        <x-slot name="content">
                            Weet je zeker of je het project genaamd
                            "<strong>{{ $project->title }}</strong>"
                            wilt verwijderen?
                        </x-slot>
                        <x-slot name="footer">
                            <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                                Annuleren
                            </button>
                            <form method="POST" action="{{ route('project.destroy', $project->id) }}">
                                @csrf
                                @method('DELETE')
                                <x-button variant="danger" class="btn-sm">Verwijderen</x-button>
                            </form>
                        </x-slot>
                    </x-admin.modal>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-admin.card>

        @section('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
            <script src="{{ asset('js/sortable-projects.js') }}"></script>
        @endsection
</x-layouts.admin>
