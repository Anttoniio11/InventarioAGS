<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-center w-100" id="{{ $modalId }}Label">{{ $title }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    <div class="row">
                        {{ $slot }}
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-guardar" form="yourFormId">{{ $buttonText }}</button>
            </div>
        </div>
    </div>
</div>
