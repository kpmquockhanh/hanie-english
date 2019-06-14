@extends('admin.layouts.master')
@section('page-header', 'Lessons')
@section('option-des', 'Update lesson')
@section('style')
    <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
@stop
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Update Lesson</h3>
        </div>
        <form action="{{ route(request()->segment(2).'.update', $lesson->id) }}" method="post" class=""
              enctype="multipart/form-data">
            @csrf
            <input type="text" name="_method" value="PUT" hidden>
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
                                    <label for="course_id">Course name</label>
                                </div>
                                <div class="col-md-12" style="margin-left: -15px">
                                    <select class="form-control course" name="course_id" hidden>
                                        <option value="{{$lesson->course->id}}"
                                                selected>{{$lesson->course->name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="title">Lesson name</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="name" class="form-control" placeholder="Lesson name"
                                           value="{{ $lesson->name }}">
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
                                        {!! $lesson->description !!}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="title">Tile</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Title" value="{{ $lesson->video->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="original_name">Original name</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="original_name" class="form-control"
                                           placeholder="Original name" value="{{ $lesson->video->original_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="video">Video</label>
                                </div>
                                <div class="nk-int-st">
                                    <div class="dash-video">
                                        <video controls style="width: 50%;">
                                            <source id="preview-video" src="{{$lesson->video->url_path}}"
                                                    type="video/mp4">
                                        </video>
                                    </div>
                                    <input type="file" name="video" id="video" class="form-control"
                                           placeholder="File video"
                                           value="{{ old('video') }}" hidden style="display: none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info" style="margin-top: 20px; text-align: center">Update</button>
                <a class="btn btn-warning pull-right" href="{{ route(request()->segment(2).'.index') }}"
                   style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
            </div>
        </form>
    </div>
@stop
@section('script')
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('node_modules//ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.config.extraAllowedContent = 'iframe[*]';
        CKEDITOR.replace('description');
    </script>
    @include('admin.lessons.scripts')
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-video').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#video").change(function () {
            readURL(this);
        });
        $('.dash-video').click(function (e) {
            e.preventDefault();
            $('#video').trigger('click');
        });

    </script>
@stop
