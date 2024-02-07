    <!-- delete_modal_grade -->
    <div class="modal fade" id="delete-img{{ $attachment->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('students.delete_attachment') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('delete-attachment') }}" method="post">
                        @csrf
                        {{ trans('grades.delete_warning_message') }}

                        <input id="id" type="hidden" name="student_id" class="form-control"
                            value="{{ $student->id }}">
                        <input id="id" type="text" name="file_name" class="form-control"
                            value="{{ $attachment->file_name }}">
                        <input id="id" type="hidden" name="student_name" class="form-control"
                            value="{{ $attachment->imageable->name }}">
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $attachment->id }}">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('grades.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('grades.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
