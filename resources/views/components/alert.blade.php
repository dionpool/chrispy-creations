@if(session()->has('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        <div class="alert alert-dismissible bg-white border border-success d-flex align-items-center py-3 px-4 position-absolute bottom-0 end-0 m-5">
            <i class="ki-duotone ki-double-check text-success fs-1 me-5">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <p class="fw-semibold mb-0 text-gray-900">{{ session('success') }}</p>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        <div class="alert alert-dismissible bg-white border border-danger d-flex align-items-center py-3 px-4 position-absolute bottom-0 end-0 m-5">
            <i class="ki-duotone ki-cross text-danger fs-1 me-5">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <p class="fw-semibold text-hover-success mb-0">De categorie kan niet worden gevonden in de database.</p>
        </div>
    </div>
@endif
