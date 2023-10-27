<x-layouts.admin title="Categorieën">
    @section('breadcrumbs')
        {{ Breadcrumbs::render('categories') }}
    @endsection

    <x-admin.card>
        <x-slot name="title">
            <h3 class="fw-bold mb-1">Categorieën</h3>
            <span class="fs-6 text-gray-400">Alle categorieën van {{ config('app.name') }}.</span>
        </x-slot>

        <x-admin.table>
            <x-slot name="thead">
                <th>Titel</th>
                <th>Slug</th>
                <th>Acties</th>
            </x-slot>

            <x-slot name="tbody">
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <x-dropdown>
                                <x-slot name="trigger">Acties</x-slot>

                                <x-dropdown-item>
                                    <a href="{{ route('category.edit', $category->id) }}" class="menu-link px-3">Bewerken</a>
                                </x-dropdown-item>

                                <x-dropdown-item>
                                    <x-button variant="admin-modal" target="deleteCategory{{  $category->id }}">Verwijderen</x-button>
                                </x-dropdown-item>
                            </x-dropdown>
                        </td>
                    </tr>

                    <x-admin.modal :id="'deleteCategory' . $category->id">
                        <x-slot name="content">
                            Weet je zeker of je de categorie genaamd
                            "<strong>{{ $category->title }}</strong>"
                            wilt verwijderen?
                        </x-slot>
                        <x-slot name="footer">
                            <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                                Annuleren
                            </button>
                            <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')

                                <x-button variant="danger" class="btn-sm">Verwijderen</x-button>
                            </form>
                        </x-slot>
                    </x-admin.modal>
                @endforeach
            </x-slot>
        </x-admin.table>
    </x-admin.card>
</x-layouts.admin>
