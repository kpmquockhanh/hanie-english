@extends('admin.layouts.master')

@section('page-header', 'Teachers')
@section('option-des', 'Danh sách giáo viên')
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
            <h3 class="box-title">Teachers list <a href="{{ route('teachers.create') }}" class="btn-sm btn-success" style="margin-left: 5px;"><i class="fa fa-plus"></i></a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Words</th>
                    <th>Image</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!$teachers->count())
                    <tr>
                        <td colspan="6" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->word }}</td>
                        <td>
                            <img src="{{ $teacher->image }}" alt="" style="height: 60px;">
                        </td>
                        <td>{{ $teacher->position }}</td>
                        <td>
                            <a href="{{ route('teachers.edit', ['id' => $teacher->id]) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('teachers.destroy', ['id' => $teacher->id]) }}" style="display: inline;" method="post">
                                @csrf
                                <input type="text" name="_method" value="delete" hidden>
                                <button type="submit" class="btn-sm btn-danger" style="padding: 2px 10px;"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Words</th>
                    <th>Image</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop