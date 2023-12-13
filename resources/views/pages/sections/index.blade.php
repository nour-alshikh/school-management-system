@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main.sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main.sections') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main.sections') }}</li>
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
                    {{ trans('sections.add_section') }}
                </button>
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">

                            <div class="accordion gray plus-icon round">
                                @foreach ($grades as $grade)
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                        <div class="acd-des">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table table-striped table-bordered p-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{ trans('sections.name') }}</th>
                                                            <th>{{ trans('sections.classroom') }}</th>
                                                            <th>{{ trans('sections.status') }}</th>
                                                            <th>{{ trans('sections.actions') }}</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp

                                                        @php
                                                            $i++;
                                                        @endphp
                                                        @foreach ($grade->sections as $section)
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $section->name }}</td>
                                                                <td>{{ $section->classroom->class_name }}</td>
                                                                <td>
                                                                    @if ($section->status == 0)
                                                                        <p class="badge badge-danger">
                                                                            {{ trans('sections.disabled') }}</p>
                                                                    @else
                                                                        <p class="badge badge-success">
                                                                            {{ trans('sections.active') }}</p>
                                                                    @endif

                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-info btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#edit{{ $section->id }}"
                                                                        title="{{ trans('grades.edit') }}">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#delete{{ $section->id }}"
                                                                        title="{{ trans('grades.delete') }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>

                                                                @include('pages.sections.modals.edit-modal')

                                                                @include('pages.sections.modals.delete-modal')


                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('pages.sections.modals.add-modal')
<!-- row closed -->
@endsection
@section('js')

@endsection
