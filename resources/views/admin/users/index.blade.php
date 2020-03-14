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
                    <th>Created by</th>
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
                            <img src="{{ $item->url_avatar ? asset($item->url_avatar) : asset('dist/img/user2-160x160.jpg') }}" alt="" style="width: 100%;">
                        </td>
                        <td class="text-{{ $item->status ?'success':'danger' }} status-user">{{ $item->status_name }}</td>
                        <td>{{ $item->admin->name }}</td>
                        <td>
                            <a href="#" class="btn-sm btn-danger btn-ban-user" data-id="{{ $item->id }}" style="display: {{ !$item->status ? 'none': 'inline' }}"><i class="fa fa-ban"></i></a>
                            <a href="#" class="btn-sm btn-info btn-active-user" data-id="{{ $item->id }}" style="display: {{ $item->status ? 'none': 'inline' }}"><i class="fa fa-check"></i></a>

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
                    <th>Created by</th>
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
@section('script')
    <script src="{{ asset('node_modules/axios/dist/axios.min.js') }}"></script>
    <script>
        $('.btn-active-user').click(function(e) {
            const id = $(this).data('id');
            e.preventDefault();
            axios.post(
                `{{ route('users.active') }}`,
                { id }
            ).then(result => {
                if(result.data.status) {
                    const status = $(this).parent().siblings('.status-user');
                    status.html('Active');
                    status.removeClass('text-danger');
                    status.addClass('text-success');
                    $(this).hide();
                    $(this).siblings('.btn-ban-user').show();
                }
            })
        });
        $('.btn-ban-user').click(function(e) {
            const id = $(this).data('id');
            e.preventDefault();
            axios.post(
                `{{ route('users.ban') }}`,
                { id }
            ).then(result => {
                if(result.data.status) {
                    const status = $(this).parent().siblings('.status-user');
                    status.html('Deactivate');
                    status.removeClass('text-success');
                    status.addClass('text-danger');
                    $(this).hide();
                    $(this).siblings('.btn-active-user').show();
                }
            })
        })
    </script>
@stop