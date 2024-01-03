    <!-- delete_modal_grade -->
    <div class="modal fade" id="delete{{ $guardian->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('parents.delete_parent') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>
                        {{ $guardian->email }}
                        {{ $guardian->id }}
                    </h5>
                    {{ trans('guardian.delete_warning_message') }}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('parents.close') }}</button>
                        <button wire:click="delete({{ $guardian->id }})"
                            class="btn btn-danger">{{ trans('parents.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
