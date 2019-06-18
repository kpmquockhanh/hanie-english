@extends('admin.layouts.master')
@section('page-header', 'Examinations')
@section('option-des', 'Examinations')
@section('style')
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
@stop
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ ucfirst(request()->segment(2)) }} list
                <a href="{{ route(request()->segment(2).'.create') }}" class="btn btn-xs btn-success" style="margin-left: 5px;">
                    <i class="fa fa-plus"></i>
                </a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('admin.layouts.flash-message')
            @include('admin.layouts.error-message')
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lesson Name</th>
                        <th>Total questions</th>
                        <th>Created by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if (!$examinations->count())
                    <tr>
                        <td colspan="5" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($examinations as $examination)
                    <tr>
                        <td>{{ $examination->id }}</td>
                        <td>{{ $examination->lesson->name }}</td>
                        <td>{{ count(json_decode($examination->question_ids)) }}</td>
                        <td>{{ $examination->admin->name }}</td>
                        <td>
                            <a href="{{ route('examinations.edit', $examination->id) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('examinations.destroy', $examination->id) }}" style="display: inline;" method="post">
                                @csrf
                                <input type="text" name="_method" value="delete" hidden>
                                <button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Lesson Name</th>
                        <th>Total questions</th>
                        <th>Created by</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop
