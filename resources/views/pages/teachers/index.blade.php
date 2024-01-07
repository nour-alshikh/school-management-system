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

                <a href="{{ route('teachers.create') }}" class="button x-small">
                    {{ trans('teachers.add_teacher') }}
                </a>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('teachers.name') }}</th>
                                <th>{{ trans('teachers.gender') }}</th>
                                <th>{{ trans('teachers.specialization') }}</th>
                                <th>{{ trans('teachers.join_date') }}</th>
                                <th>{{ trans('teachers.actions') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($teachers as $teacher)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->gender->name }}</td>
                                    <td>{{ $teacher->specialization->name }}</td>
                                    <td>{{ $teacher->join_date }}</td>
                                    <td>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                                            class="btn btn-info btn-sm" title="{{ trans('teachers.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $teacher->id }}"
                                            title="{{ trans('grades.delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>



                                    @include('pages.teachers.modals.delete-modal')


                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')

@endsection
