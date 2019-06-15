@extends('admin.layouts.master')
@section('page-header', 'Lessons')
@section('option-des', 'Lessons')
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
                    <th>Course name</th>
                    <th>Lesson name</th>
                    <th>Video title</th>
                    <th>Video name</th>
                    <th>Video</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!$lessons->count())
                    <tr>
                        <td colspan="5" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->course->name }}</td>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->video->title }}</td>
                        <td>{{ $lesson->video->original_name }}</td>
                        <td>
                            <video  width="200" controls>
                                <source src="{{$lesson->video->url_path}}" type="video/mp4">
                            </video>
                        </td>
                        <td>
                            <a href="{{ route(request()->segment(2).'.edit', $lesson->id) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route(request()->segment(2).'.destroy', $lesson->id) }}" style="display: inline;" method="post">
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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ $lessons->links() }}
        </div>
    </div>
    <!-- /.box -->
@stop
