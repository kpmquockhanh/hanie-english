@extends('admin.layouts.master')
@section('style')
    <style>
        .dash-circle{
            width: 20vw;
            height: 20vw;
            background: #eee;
            margin: auto;
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
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>
                                <span>Create a teacher</span>
                                <a href="{{ route('teachers.index') }}" class="btn btn-info">Back</a>
                            </h2>
                        </div>
                        <form action="{{ route('teachers.update', ['id' => $teacher->id]) }}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="_method" value="PUT" hidden>
                            <div class="row">
                                <div style="display: flex; flex-direction: column; align-items: center;">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-support"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="text" name="name" class="form-control" placeholder="Your Teacher's Name" value="{{ $teacher->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-next"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control" placeholder="Words" name="word" value="{{ $teacher->word }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-star"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control" placeholder="Position" name="position" value="{{ $teacher->position }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="dash-circle">
                                        <img id="preview-img" src="{{ asset($teacher->image)??asset('dashboard/img/avatar.svg') }}" alt="" style="width: 100%;">
                                    </div>
                                    <input type="file" id="image" name="image" hidden style="display: none;"/>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center">
                                <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
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