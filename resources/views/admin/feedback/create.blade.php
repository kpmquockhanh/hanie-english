@extends('admin.layouts.master')
@section('style')
@stop
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ ucfirst((request()->segment(3)?request()->segment(3).' ':'').request()->segment(2)) }}</h3>
        </div>
        <!-- /.box-header -->
        <form action="{{ route(request()->segment(2).'.store') }}" method="post" class="" enctype="multipart/form-data">
            <div class="box-body">
                @include('admin.layouts.flash-message')
                @include('admin.layouts.error-message')
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea type="text" name="content" class="form-control" placeholder="Content" id="content">{{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Create</button>
                <a class="btn btn-warning pull-right" href="{{ route(request()->segment(2).'.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
            </div>
        </form>
    </div>
@stop
@section('script')
    <script src="{{ asset('node_modules//ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@stop