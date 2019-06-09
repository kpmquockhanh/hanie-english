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
    <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
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
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Categories</label>
                            <select multiple class="form-control categories" name="categories[]" hidden></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Content</label>
                            <input type="text" name="content" class="form-control" placeholder="Content" value="{{ old('content') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Right answer</label>
                            <select class="form-control right-answer" name="right_answer_id" hidden>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Wrong answers</label>
                            <select multiple class="form-control wrong-answers" name="wrong_answer_ids[]" hidden>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label for="">Your answer not exists?</label>
                        <div>
                            <a href="{{ route('answers.create') }}" target="_blank" class="btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Add a answer
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Explain</label>
                            <input type="text" name="explain" class="form-control" placeholder="Explain" value="{{ old('explain') }}">
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
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                // increaseArea: '20%' /* optional */
            });
        });

    </script>
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
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    @include('admin.questions.scripts')
@stop
