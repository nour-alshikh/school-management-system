@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main.classrooms') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main.classrooms') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main.classrooms') }}</li>
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
                    {{ trans('classrooms.add_class') }}
                </button>

                <button type="button" class="button x-small" id="delete-all-btn">
                    {{ trans('classrooms.delete_chosen_classes') }}
                </button>

                <form action="{{ route('classrooms.filter-classes') }}" method="POST">
                    @csrf
                    <select class="form-select" name="search_id" onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('classrooms.search_with_grade') }}</option>
                        <option value="all-grades">{{ trans('classrooms.all') }}</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    <input type="checkbox" id="example-select-all" onclick="checkAll('box1' , this)" />
                                </th>
                                <th>{{ trans('classrooms.name') }}</th>
                                <th>{{ trans('classrooms.grade') }}</th>
                                <th>{{ trans('classrooms.actions') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @if (isset($filter_result))
                                <?php $class_list = $filter_result; ?>
                            @else
                                <?php $class_list = $classrooms; ?>
                            @endif

                            @foreach ($class_list as $classroom)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <input type="checkbox" class="box1" value="{{ $classroom->id }}" />
                                    </td>
                                    <td>{{ $classroom->class_name }}</td>
                                    <td>{{ $classroom->Grades->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $classroom->id }}"
                                            title="{{ trans('classrooms.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $classroom->id }}"
                                            title="{{ trans('classrooms.delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>

                                    @include('pages.classrooms.modals.edit-modal')
                                    @include('pages.classrooms.modals.delete-modal')

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

@include('pages.classrooms.modals.add-modal')

@include('pages.classrooms.modals.delete-all-modal')


@endsection
@section('js')
<script>
    $(function() {
        $('#delete-all-btn').click(function() {
            var selected = new Array()
            $("#datatable input[type=checkbox]:checked").each(function() {

                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete-all').modal('show')
                $('input[id="delete_all_ids"]').val(selected)
            }
        })
    });
</script>


@endsection
