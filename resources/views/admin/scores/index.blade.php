@extends('admin.layouts.master')
{{--@section('page-header', 'Examinations')--}}
{{--@section('option-des', 'Examinations')--}}
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
{{--                <a href="{{ route(request()->segment(2).'.create') }}" class="btn btn-xs btn-success" style="margin-left: 5px;">--}}
{{--                    <i class="fa fa-plus"></i>--}}
{{--                </a>--}}
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
                        <th>User Name</th>
                        <th>Lesson</th>
                        <th>Score</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if (!$scores->count())
                    <tr>
                        <td colspan="5" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($scores as $score)
                    <tr>
                        <td>{{ $score->id }}</td>
                        <td>
                            <a href="{{ route('users.show', $score->user->id) }}">{{ $score->user?$score->user->name:'' }}</a>
                        </td>
                        <td>
                            <a href="{{ route('lessons.edit', $score->lesson->id) }}">{{ $score->lesson?$score->lesson->name:'' }}</a>
                        </td>
                        <td>{{ $score->score }}</td>
                        <td>{{ $score->note ?? 'Empty' }}</td>
                        <td class="{{ $score->isExpired() ? 'text-danger' : 'text-success' }}">{{ $score->isExpired() ? 'Done' : 'Doing' }}</td>
                        <td>{{ $score->created_at->diffForHumans() }}</td>
                        <td>
{{--                            <a href="{{ route('scores.edit', $score->id) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>--}}
                            <form action="{{ route('scores.destroy', $score->id) }}" style="display: inline;" method="post">
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
                        <th>User Name</th>
                        <th>Lesson</th>
                        <th>Score</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ $scores->links() }}
        </div>
    </div>
    <!-- /.box -->
@stop
