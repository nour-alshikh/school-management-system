@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main.grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main.grades') }}</h4>
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

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('grades.add_grade') }}
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('grades.name') }}</th>
                                <th>{{ trans('grades.notes') }}</th>
                                <th>{{ trans('grades.actions') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($grades as $grade)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->notes }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}" title="{{ trans('grades.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}"
                                            title="{{ trans('grades.delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>

                                    @include('pages.grades.modals.edit-modal')

                                    @include('pages.grades.modals.delete-modal')


                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@include('pages.grades.modals.add-modal')
<!-- row closed -->
@endsection
@section('js')

@endsection
