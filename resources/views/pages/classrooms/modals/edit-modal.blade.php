   <!-- edit_modal_grade -->
   <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                       {{ trans('classrooms.edit_class') }}
                   </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <!-- add_form -->
                   <form action="{{ route('classrooms.update', 'test') }}" method="post">
                       {{ method_field('patch') }}
                       @csrf
                       <div class="row">
                           <input id="id" type="hidden" name="id" class="form-control"
                               value="{{ $classroom->id }}">

                           <div class="col-md-4">
                               <label for="Name" class="mr-sm-2">{{ trans('classrooms.name') }}
                                   :</label>
                               <input class="form-control" type="text" name="name"
                                   value="{{ $classroom->getTranslation('class_name', 'ar') }}" />

                           </div>


                           <div class="col-md-4">
                               <label for="Name" class="mr-sm-2">{{ trans('classrooms.name_en') }}
                                   :</label>
                               <input class="form-control" type="text" name="name_en"
                                   value="{{ $classroom->getTranslation('class_name', 'en') }}" />
                           </div>


                           <div class="col-md-4">
                               <label for="grade_id" class="mr-sm-2">{{ trans('classrooms.grade') }}
                                   :</label>

                               <div class="box">
                                   <select class="fancyselect form-control " name="grade_id">
                                       @foreach ($grades as $grade)
                                           <option @if ($grade->id == $classroom->grades->id) selected @endif
                                               value="{{ $grade->id }}">{{ $grade->name }}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <br><br>
                           </div>
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
   </div>
