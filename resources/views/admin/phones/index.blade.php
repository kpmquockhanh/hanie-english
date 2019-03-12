@extends('admin.layouts.master')

@section('content')
    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>
                                <span>Teachers list</span>
                                {{--<a href="{{ route('phones.create') }}" class="btn btn-success"><i class="fa fa-plus"></i></a>--}}
                            </h2>
                        </div>
                        <div class="bsc-tbl-hvr">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!$phones->count())
                                    <tr>
                                        <td colspan="5" class="text-center">No data.</td>
                                    </tr>
                                @endif
                                @foreach ($phones as $phone)
                                    <tr>
                                        <td>{{ $phone->id }}</td>
                                        <td>{{ $phone->name }}</td>
                                        <td>{{ $phone->phone_number }}</td>
                                        <td>
{{--                                            <a href="{{ route('phones.edit', ['id' => $phone->id]) }}" class="btn-sm btn-success"><i class="fa fa-pencil"></i></a>--}}
                                            <form action="{{ route('phones.destroy', ['id' => $phone->id]) }}" style="display: inline;" method="post">
                                                @csrf
                                                <input type="text" name="_method" value="delete" hidden>
                                                <button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop