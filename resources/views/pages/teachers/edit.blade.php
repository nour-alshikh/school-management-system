@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main.teachers') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main.teachers') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main.grades') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<section>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div>
                        <form action="{{ route('teachers.update', 'test') }}" method="POST">
                            {{ method_field('patch') }}
                            @csrf
                            <input name="id" value="{{ $teacher->id }}" type="hidden">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{ trans('teachers.email') }}</label>
                                            <input name="email" value="{{ $teacher->email }}" type="email"
                                                class="form-control">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{ trans('teachers.password') }}</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{ trans('teachers.name') }}</label>
                                            <input type="text" value="{{ $teacher->getTranslation('name', 'ar') }}"
                                                name="name" class="form-control">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{ trans('teachers.name_en') }}</label>
                                            <input type="text" name="name_en"
                                                value="{{ $teacher->getTranslation('name', 'en') }}"
                                                class="form-control">
                                            @error('name_en')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col">
                                            <label for="inputState">{{ trans('teachers.gender') }}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                                <option selected>{{ trans('teachers.choose') }}...</option>
                                                @foreach ($genders as $gender)
                                                    <option @if ($gender->id == $teacher->gender_id) selected @endif
                                                        value="{{ $gender->id }}">{{ $gender->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('gender')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">{{ trans('teachers.specialization') }}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                                <option selected>{{ trans('teachers.choose') }}...</option>
                                                @foreach ($specializations as $specialization)
                                                    <option @if ($specialization->id == $teacher->specialization_id) selected @endif
                                                        value="{{ $specialization->id }}">
                                                        {{ $specialization->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('specialization')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1">{{ trans('teachers.join_date') }}</label>
                                        <input class="form-control" value="{{ $teacher->join_date }}" name="join_date"
                                            type="date">
                                        @error('join_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1">{{ trans('teachers.address') }}</label>
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="4">{{ $teacher->address }}</textarea>
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-success btn-sm s btn-lg pull-right"
                                        type="submit">{{ trans('teachers.submit') }}
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
@section('js')

@endsection
