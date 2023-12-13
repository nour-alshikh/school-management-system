<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('grades.add_grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grades.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{ trans('grades.name_ar') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="name_en" class="mr-sm-2">{{ trans('grades.name_en') }}
                                :</label>
                            <input id="name_en" type="text" class="form-control" name="name_en" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('grades.notes') }}
                            :</label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('grades.close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('grades.submit') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>
