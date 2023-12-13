<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="classList">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="Name" class="mr-sm-2">{{ trans('classrooms.name') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name" />
                                        </div>


                                        <div class="col-md-3">
                                            <label for="Name" class="mr-sm-2">{{ trans('classrooms.name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>


                                        <div class="col-md-3">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('classrooms.grade') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="grade_id">
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-3 d-flex justify-content-center align-items-center">

                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                value="{{ trans('classrooms.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button"
                                        value="{{ trans('classrooms.add_row') }}" />
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('classrooms.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
