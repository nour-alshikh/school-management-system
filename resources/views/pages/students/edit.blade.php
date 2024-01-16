@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main.students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main.students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main.edit_student') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <form action="{{ route('students.update', 'test') }}" method="POST">
                        {{ method_field('patch') }}
                        @csrf
                        <input name="id" value="{{ $student->id }}" type="hidden">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h5 class=" fw-bold text-primary">{{ trans('students.pesonal_info') }}</h5>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="name">{{ trans('students.name_ar') }}</label>
                                        <input name="name" value="{{ $student->getTranslation('name', 'ar') }}"
                                            type="text" class="form-control">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="name_en">{{ trans('students.name_en') }}</label>
                                        <input type="text" name="name_en"
                                            value="{{ $student->getTranslation('name', 'en') }}" class="form-control">
                                        @error('name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('students.email') }}</label>
                                        <input name="email" value="{{ $student->email }}" type="email"
                                            class="form-control">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{ trans('students.password') }}</label>
                                        <input type="password" value="{{ $student->password }}" name="password"
                                            class="form-control">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">{{ trans('students.gender') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="gender">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>
                                            @foreach ($data['genders'] as $gender)
                                                <option @if ($student->gender->id == $gender->id) selected @endif
                                                    value="{{ $gender->id }}">{{ $gender->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputZip">{{ trans('students.nationality') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="nationality">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>
                                            @foreach ($data['nationalities'] as $nationality)
                                                <option @if ($student->nationality->id == $nationality->id) selected @endif
                                                    value="{{ $nationality->id }}">
                                                    {{ $nationality->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('nationality')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputZip">{{ trans('students.blood_type') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="blood_type">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>
                                            @foreach ($data['blood_types'] as $blood_type)
                                                <option @if ($student->blood_type->id == $blood_type->id) selected @endif
                                                    value="{{ $blood_type->id }}">
                                                    {{ $blood_type->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('blood_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label
                                            for="exampleFormControlTextarea1">{{ trans('students.birth_date') }}</label>
                                        <input class="form-control" value="{{ $student->birth_date }}"
                                            name="birth_date" type="date">
                                        @error('birth_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <h5 class=" fw-bold text-primary">{{ trans('students.student_info') }}</h5>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">{{ trans('students.grade') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="grade">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>
                                            @foreach ($data['grades'] as $grade)
                                                <option @if ($student->grade->id == $grade->id) selected @endif
                                                    value="{{ $grade->id }}">{{ $grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('grade')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputZip">{{ trans('students.classroom') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="classroom">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>

                                        </select>
                                        @error('classroom')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputZip">{{ trans('students.section') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="section">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>

                                        </select>
                                        @error('section')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputZip">{{ trans('students.guardian') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="guardian">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>
                                            @foreach ($data['guardians'] as $guardian)
                                                <option @if ($student->guardian->id == $guardian->id) selected @endif
                                                    value="{{ $guardian->id }}">
                                                    {{ $guardian->father_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('guardian')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputZip">{{ trans('students.academic_year') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="academic_year">
                                            <option disabled selected>{{ trans('students.choose') }}...</option>
                                            @php
                                                $current_year = date('Y');
                                            @endphp
                                            @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                <option @if ($student->academic_year == $year) selected @endif
                                                    value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        @error('academic_year')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <button class="btn btn-success btn-sm s btn-lg pull-right"
                                    type="submit">{{ trans('students.submit') }}
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('select[name="grade"]').on('change', function() {
            let grade_Id = $(this).val();
            if (grade_Id) {
                $.ajax({
                    url: "{{ URL::to('/get-classes') }}" + '/' + grade_Id,
                    type: "GET",
                    dateType: "json",
                    success: function(data) {
                        $('select[name="classroom"]').empty();
                        $('select[name="section"]').empty();
                        $('select[name="classroom"]').append(
                            `<option selected disabled> {{ trans('students.choose') }}
                            </option>`
                        )
                        $('select[name="section"]').append(
                            `<option selected disabled> {{ trans('students.choose') }}
                            </option>`
                        )
                        $.each(data, function(key, value) {
                            $('select[name="classroom"]').append(
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

    $(document).ready(function() {
        $('select[name="classroom"]').on('change', function() {
            let classroom_Id = $(this).val();
            if (classroom_Id) {
                $.ajax({
                    url: "{{ URL::to('/get-sections') }}" + '/' + classroom_Id,
                    type: "GET",
                    dateType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="section"]').empty();

                        $('select[name="section"]').append(
                            `<option selected disabled> {{ trans('students.choose') }}
                            </option>`
                        )
                        $.each(data, function(key, value) {
                            $('select[name="section"]').append(
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
