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
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label>Lesson number</label>
                            <input type="number" name="lesson_number" class="form-control" placeholder="Lesson number" value="{{ old('lesson_number') }}">
                        </div>
                        <div class="form-group">
                            <label>Duration by week</label>
                            <input type="number" name="duration_by_week" class="form-control" placeholder="Duration by week" value="{{ old('duration_by_week') }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                                <textarea name="desc" class="form-control" placeholder="Description">{{ old('desc') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="dash-circle" style="width: 10%; margin: auto; cursor: pointer">
                            <img id="preview-img" src="{{ asset('images/avatars/default-avatar.svg') }}" alt="" style="width: 100%;">
                        </div>
                        <input type="file" id="image" name="image" hidden style="display: none;"/>
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
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
        $('.dash-circle').click(function (e) {
            e.preventDefault();
            $('#image').trigger('click');
        });
    </script>
@stop