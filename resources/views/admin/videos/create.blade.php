@extends('admin.layouts.master')
@section('page-header', 'Videos')
@section('option-des', 'Create video')
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create Video</h3>
        </div>
        <form action="{{ route(request()->segment(2).'.store') }}" method="post" class="" enctype="multipart/form-data">
            @csrf
            <div class="box-header">
                <div class="row">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        @if ($errors->first())
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="title">Title</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="original_name">Original name</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="original_name" class="form-control" placeholder="Original name" value="{{ old('original_name') }}">
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <label for="video">Video</label>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="file" name="video" class="form-control" placeholder="File video" value="{{ old('file') }}" accept = 'video/*'>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Create</button>
                <a class="btn btn-warning pull-right" href="{{ route(request()->segment(2).'.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
            </div>
        </form>
    </div>
@stop
