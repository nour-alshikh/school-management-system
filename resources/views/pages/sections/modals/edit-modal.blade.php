   <!-- edit_modal_grade -->
   <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                       {{ trans('sections.edit_section') }}
                   </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <!-- add_form -->
                   <form action="{{ route('sections.update', 'test') }}" method="post">
                       {{ method_field('patch') }}
                       @csrf
                       <div class="row">
                           <div class="col">
                               <label for="name" class="mr-sm-2">{{ trans('sections.name_ar') }}
                                   :</label>
                               <input id="name" type="text" name="name" class="form-control"
                                   value="{{ $section->getTranslation('name', 'ar') }}">
                               <input id="id" type="hidden" name="id" class="form-control"
                                   value="{{ $section->id }}">
                           </div>
                           <div class="col">
                               <label for="name_en" class="mr-sm-2">{{ trans('sections.name_en') }}
                                   :</label>
                               <input type="text" class="form-control"
                                   value="{{ $section->getTranslation('name', 'en') }}" name="name_en" required>
                           </div>
                       </div>


                       <div class="form-group">
                           <label for="grade_id" class="mr-sm-2">{{ trans('sections.grade') }}
                               :</label>
                           <select class="form-select" style="width: 100%" name="grade_id">
                               @foreach ($grades_list as $grade)
                                   <option @if ($section->grade->id == $grade->id) selected @endif
                                       value="{{ $grade->id }}">{{ $grade->name }}</option>
                               @endforeach
                           </select>
                       </div>

                       <div class="form-group">
                           <label for="class_id" class="mr-sm-2">{{ trans('sections.classroom') }}
                               :</label>
                           <select class="form-select" style="width: 100%" name="class_id">
                               <option value="{{ $section->classroom->id }}">{{ $section->classroom->class_name }}
                               </option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="class_id" class="mr-sm-2">{{ trans('sections.status') }}
                               :</label>
                           <input type="checkbox" class="form-control" name="status" value="{{ $section->status }}"
                               @if ($section->status == 1) checked @endif>

                       </div>

                       <br><br>

                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('sections.close') }}</button>
                           <button type="submit" class="btn btn-success">{{ trans('sections.submit') }}</button>
                       </div>
                   </form>

               </div>
           </div>
       </div>
   </div>

   @section('js')
       <script>
           $(document).ready(function() {
               $('select[name="grade_id"]').on('change', function() {
                   let grade_Id = $(this).val();
                   if (grade_Id) {
                       $.ajax({
                           url: "{{ URL::to('/get-classes') }}" + '/' + grade_Id,
                           type: "GET",
                           dateType: "json",
                           success: function(data) {
                               $('select[name="class_id"]').empty();
                               $.each(data, function(key, value) {
                                   console.log(key);
                                   console.log(value);
                                   $('select[name="class_id"]').append(
                                       '<option value="' + key + '">' + value +
                                       '</option>'
                                   )
                               })
                           }
                       })
                   } else {
                       console.log("Error");
                   }
               })
           })
       </script>
   @endsection
