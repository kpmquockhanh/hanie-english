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
            <h3 class="box-title">{{ ucfirst(request()->segment(2)) }} list
                <a href="{{ route(request()->segment(2).'.create') }}" class="btn-sm btn-success" style="margin-left: 5px;">
                    <i class="fa fa-plus"></i>
                </a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('admin.layouts.flash-message')
            @include('admin.layouts.error-message')
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Content</th>
                    <th>Explain</th>
                    <th>Right answer</th>
                    {{--<th>Wrong answer ids</th>--}}
                    <th>Created by</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!$questions->count())
                    <tr>
                        <td colspan="8" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->content }}</td>
                        <td>{{ $question->explain }}</td>
                        <td><i>{{ $question->rightAnswer->content }}</i></td>
                        <td>{{ $question->admin->name }}</td>
                        <td>
                            <a href="{{ route('questions.edit', ['id' => $question->id]) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('questions.destroy', ['id' => $question->id]) }}" style="display: inline;" method="post">
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
                        <th>Content</th>
                        <th>Explain</th>
                        <th>Right answer</th>
                        {{--<th>Wrong answers</th>--}}
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
