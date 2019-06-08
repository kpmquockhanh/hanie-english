@extends('admin.layouts.master')
@section('page-header', 'Courses')
@section('option-des', 'Thêm khóa học')
@section('content')
    <div class="container">
        <form action="{{ route('courses.store') }}" method="post" class="">
            @csrf
            <div class="row">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    @if ($errors->first())
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-support"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" name="name" class="form-control" placeholder="Course's Name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-next"></i>
                            </div>
                            <div class="nk-int-st">
                                <textarea class="html-editor" id="description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; justify-content: center">
                <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Create</button>
                <a class="btn btn-warning" href="{{ route('courses.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
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
