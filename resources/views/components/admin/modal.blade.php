@props(['id'])

<div class="modal modal-confirm fade" id="{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="ki-duotone ki-information-5 text-danger mb-5">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
                <p>
                    {{ $content }}
                </p>
            </div>
            <div class="modal-footer justify-content-center">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>
