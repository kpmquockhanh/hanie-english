@extends('admin.layouts.master')
@section('style')
    <style>
        .dash-circle{
            width: 10vw;
            height: 10vw;
            background: #eee;
            margin: 20px auto;
            border-radius: 50%;
            /* border: 3px dashed white; */
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            box-shadow: 1px 1px 5px;
        }
    </style>
@stop
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ ucfirst((request()->segment(3)?request()->segment(3).' ':'').request()->segment(2)) }}</h3>
        </div>
        <!-- /.box-header -->
        <form action="{{ route('admin.profile') }}" method="post" class="" enctype="multipart/form-data">
            <div class="box-body">
                @include('admin.layouts.error-message')
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-lg-12">
                        <label for="image">Avatar</label>
                        <div class="dash-circle">
                            <img id="preview-img" src="{{ $admin->avatar ? asset($admin->url_avatar) : asset('dist/img/user2-160x160.jpg') }}" alt="" style="width: 100%;">
                        </div>
                        <input type="file" id="image" name="avatar" hidden style="display: none;"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $admin->name) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="● ● ● ● ● ●" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>RePassword</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="● ● ● ● ● ●" value="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info" style="margin-top: 20px; text-align: center">Update</button>
                <a class="btn btn-warning pull-right" href="{{ route('admin.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
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
