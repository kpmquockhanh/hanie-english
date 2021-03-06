@extends('admin.layouts.master')
@section('page-header', 'Courses')
@section('option-des', "Edit course")
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit course {{$course->name}}</h3>
        </div>
        <form action="{{ route('courses.update', $course->id) }}" method="post" class="">
            @csrf
            <input type="text" name="_method" value="PUT" hidden>
            <div class="box-body">
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
                                    <label for="name">Name</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="name" class="form-control" placeholder="Course's Name"
                                           value="{{ $course->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="description">Description</label>
                                </div>
                                <div class="nk-int-st">
                                <textarea class="html-editor" id="description" name="description">
                                    {{$course->description}}
                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info" style="margin-top: 20px; text-align: center">Update</button>
                <a class="btn btn-warning pull-right" href="{{ route(request()->segment(2).'.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
            </div>
        </form>
    </div>
@stop
@section('script')
    <script src="{{ asset('node_modules//ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.config.extraAllowedContent = 'iframe[*]';
        CKEDITOR.replace('description');
    </script>

@endsection
