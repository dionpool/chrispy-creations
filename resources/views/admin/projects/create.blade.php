<x-layouts.admin title="Nieuw Project">
    @section('breadcrumbs')
        {{ Breadcrumbs::render('project.new') }}
    @endsection

    <form method="POST" action="{{ route('project.new') }}" enctype="multipart/form-data">
        @csrf

        <div class="row gx-5">
            <div class="col-lg-9 col-sm-12">
                <x-admin.card>
                    <!-- Card header -->
                    <x-slot name="title">
                        <h3 class="fw-bold mb-1">Project details</h3>
                        <span class="fs-6 text-gray-400">Maak een nieuw project aan.</span>
                    </x-slot>

                    <!-- Title -->
                    <div class="mb-7">
                        <label for="title" class="mb-1">Titel:</label>
                        <input type="text" name="title" id="title" class="form-control">

                        @error('title') {{ $message }} @enderror
                    </div>

                    <!-- Slug -->
                    <div class="mb-7">
                        <label for="slug" class="mb-1">Slug:</label>
                        <input type="text" name="title" id="title" class="form-control" disabled>
                    </div>

                    <!-- Description -->
                    <div class="mb-7">
                        <label for="description" class="mb-1">Omschrijving:</label>
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>

                        @error('description') {{ $message }} @enderror
                    </div>

                    <!-- Images -->
                    <div class="mb-7">
                        <label for="images" class="mb-1">Carousel afbeeldingen:</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>

                        @error('images[]') {{ $message }} @enderror
                    </div>
                </x-admin.card>
            </div>

            <div class="col-lg-3 col-sm-12">
                <x-admin.card>
                    <!-- Card header -->
                    <x-slot name="title">
                        <h3 class="fw-bold mb-1">Project Info</h3>
                        <span class="fs-6 text-gray-400">Specifieke informatie</span>
                    </x-slot>

                    <!-- Thumbnail -->
                    <div class="mb-7">
                        <label for="thumbnail" class="mb-1">Thumbnail:</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">

                        @error('thumbnail') {{ $message }} @enderror
                    </div>

                    <!-- Thumbnail size -->
                    <div class="mb-7">
                        <label for="size" class="mb-1">Thumbnail grootte:</label>
                        <select name="size" id="size" class="form-select">
                            <option>Kies een grootte...</option>
                            <option value="big">Groot</option>
                            <option value="small">Klein</option>
                        </select>
                    </div>

                    <!-- Category -->
                    <div class="mb-7">
                        <label for="category" class="mb-1">Categorie:</label>
                        <select name="category" id="category" class="form-select">
                            <option>Kies een categorie...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        @error('category') {{ $message }} @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-7">
                        <label for="status" class="mb-1">Status:</label>
                        <select name="status" id="status" class="form-select">
                            <option>Kies een status...</option>
                            <option value="published">Publiceren</option>
                            <option value="concept">Concept</option>
                            <option value="hidden">Verbergen</option>
                        </select>
                    </div>

                    <!-- Publish button -->
                    <x-button variant="primary">Aanmaken</x-button>
                </x-admin.card>
            </div>
        </div>
    </form>

    @section('scripts')
        <x-layouts.scripts.tinymce-config />
    @endsection
</x-layouts.admin>
