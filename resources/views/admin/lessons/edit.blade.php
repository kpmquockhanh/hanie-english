@extends('admin.layouts.master')
@section('page-header', 'Lessons')
@section('option-des', 'Update lesson')
@section('style')
    <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet">

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
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
                                    <label for="course_id">Course</label>
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
                                    <label for="original_name">Video name</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="original_name" class="form-control"
                                           placeholder="Original name" value="{{ $lesson->video->original_name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center;">
                            <div class="col-lg-6" style="margin: auto;">
                                <video
                                        id="player"
                                        class="video-js"
                                        controls
                                        autoplay
                                        preload="auto"
                                        data-setup='{}' style="width: 100%;">
                                    @if (!$lesson->video->hls_path)
                                        <source src="{{ $lesson->video->hls_path }}" type="application/x-mpegURL">
                                    @else
                                        <source src="{{ $lesson->video->url_path }}" type="video/mp4">
                                    @endif

                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">
                                            supports HTML5 video
                                        </a>
                                    </p>
                                </video>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="video">Video</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="file" name="video"
                                           placeholder="File video"
                                           value="{{ old('video') }}" accept="video/*">
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
@stop
