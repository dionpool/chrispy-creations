<x-layouts.admin title="Nieuwe Categorie">
    @section('breadcrumbs')
        {{ Breadcrumbs::render('category.new') }}
    @endsection

    <x-admin.card>
        <x-slot name="title">
            <h3 class="fw-bold mb-1">Nieuwe Categorie</h3>
            <span class="fs-6 text-gray-400">Maak een nieuwe categorie.</span>
        </x-slot>

        <form method="POST" action="{{ route('category.new') }}">
            @csrf

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-7">
                        <label for="title">Titel:</label>
                        <input type="text" name="title" id="title" class="form-control">

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
                    <x-button variant="primary">Aanmaken</x-button>
                </div>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
