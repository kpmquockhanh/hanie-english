@extends('admin.layouts.master')
@section('page-header', 'Videos')
@section('option-des', 'Videos')
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
                    <th>Title</th>
                    <th>Original name</th>
                    <th>Disk</th>
                    <th>Path</th>
                    <th>Converted for download at</th>
                    <th>Converted for stream at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!$videos->count())
                    <tr>
                        <td colspan="5" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($videos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->original_name }}</td>
                        <td>{{ $video->disk }}</td>
                        <td>{{ $video->path }}</td>
                        <td>{{ $video->converted_for_download_at }}</td>
                        <td>{{ $video->converted_for_stream_at }}</td>
                        <td>
                            <a href="{{ route(request()->segment(2).'.edit', $video->id) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route(request()->segment(2).'.destroy', $video->id) }}" style="display: inline;" method="post">
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
                    <th>Title</th>
                    <th>Original name</th>
                    <th>Disk</th>
                    <th>Path</th>
                    <th>Converted for download at</th>
                    <th>Converted for stream at</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ $videos->links() }}
        </div>
    </div>
    <!-- /.box -->
@stop
