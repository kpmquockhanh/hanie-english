@extends('admin.layouts.master')

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
                <a href="{{ route(request()->segment(2).'.create') }}" class="btn-sm btn-success" style="margin-left: 5px;">
                    <i class="fa fa-plus"></i>
                </a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('admin.layouts.flash-message')
            @include('admin.layouts.error-message')
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Document link</th>
                        <th>Lesson number</th>
                        <th>Duration by week</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if (!$levels->count())
                    <tr>
                        <td colspan="6" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($levels as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <img src="{{ $item->url_image }}" alt="" style="height: 60px;">
                        </td>

                        <td>
                            @if ($item->testLink)
                                <a href="{{ route('test-link.edit', $item->testLink->id) }}">{{ $item->testLink->label }}</a>
                            @else
                                ...
                            @endif
                        </td>
                        <td>{{ $item->lesson_number }}</td>
                        <td>{{ $item->duration_by_week }}</td>
                        <td>
                            <a href="{{ route(request()->segment(2).'.edit', ['id' => $item->id]) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route(request()->segment(2).'.destroy', ['id' => $item->id]) }}" style="display: inline;" method="post">
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Document link</th>
                        <th>Lesson number</th>
                        <th>Duration by week</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ $levels->links() }}
        </div>
    </div>
    <!-- /.box -->
@stop
