<x-layouts.admin title="Categorie bewerken: {{ $category->title }}">
    @section('breadcrumbs')
        {{ Breadcrumbs::render('categories') }}
    @endsection

    <x-admin.card>
        <x-slot name="title">
            <h3 class="fw-bold mb-1">Categorie Bewerken</h3>
            <span class="fs-6 text-gray-400">Je bent momenteel de categorie "{{ $category->title }}" aan het bewerken.</span>
        </x-slot>

        <form method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-7">
                        <label for="title">Titel:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">

                        @error('title') {{ $message }} @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="mb-7">
                        <label for="slug">Slug:</label>
                        <input type="text" name="slug" id="slug" class="form-control" disabled>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <x-button variant="primary">Bewerken</x-button>
                </div>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
