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
            <h3 class="box-title row" style="display: flex; align-items: center">
                <div class="col-lg-4">
                    {{ ucfirst(request()->segment(2)) }} list
                    <a href="{{ route(request()->segment(2).'.create') }}" class="btn-sm btn-success" style="margin-left: 5px;">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <form action="" class="col-lg-8">
                    <div class="input-group input-group-sm pull-right">
                        <input type="text" class="form-control" name="q" value="{{ request('q') }}">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                            <a href="{{ route('users.index') }}" class="btn btn-success btn-flat">
                            <i class="fa fa-align-justify"></i>
                        </a>
                    </span>
                    </div>
                </form>
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
                    <th>Name</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!$users->count())
                    <tr>
                        <td colspan="8" class="text-center">No data</td>
                    </tr>
                @endif
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="{{ route('users.show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                        </td>
                        <td>{{ $item->username }}</td>
                        <td width="7%" height="10%">
                            <img src="{{ $item->avatar ? asset($item->avatar) : asset('dist/img/user2-160x160.jpg') }}" alt="" style="width: 100%;">
                        </td>
                        <td class="text-{{ $item->status ?'success':'danger' }}">{{ $item->status_name }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
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
                    <th>Name</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ $users->links() }}
        </div>
    </div>
    <!-- /.box -->
@stop