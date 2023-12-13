   <!-- edit_modal_grade -->
   <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                       {{ trans('grades.edit_grade') }}
                   </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <!-- add_form -->
                   <form action="{{ route('grades.update', 'test') }}" method="post">
                       {{ method_field('patch') }}
                       @csrf
                       <div class="row">
                           <div class="col">
                               <label for="name" class="mr-sm-2">{{ trans('grades.name_ar') }}
                                   :</label>
                               <input id="name" type="text" name="name" class="form-control"
                                   value="{{ $grade->getTranslation('name', 'ar') }}">
                               <input id="id" type="hidden" name="id" class="form-control"
                                   value="{{ $grade->id }}">
                           </div>
                           <div class="col">
                               <label for="name_en" class="mr-sm-2">{{ trans('grades.name_en') }}
                                   :</label>
                               <input type="text" class="form-control"
                                   value="{{ $grade->getTranslation('name', 'en') }}" name="name_en" required>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="exampleFormControlTextarea1">{{ trans('grades.notes') }}
                               :</label>
                           <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->notes }}</textarea>
                       </div>
                       <br><br>

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
