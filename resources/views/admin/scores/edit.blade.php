@extends('admin.layouts.master')
@section('page-header', 'Examinations')
@section('option-des', 'Edit examination')
@section('style')
    <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
@stop
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Examination</h3>
        </div>
        <form action="{{ route(request()->segment(2).'.update', $examination->id) }}" method="post" class="" enctype="multipart/form-data">
            @include('admin.layouts.error-message')
            @csrf
            {{ method_field('PUT') }}
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
                                    <label for="title">Lesson name</label>
                                </div>
                                <div class="nk-int-st">
                                    <select class="form-control lessons" name="lesson_id" hidden>
                                        <option value="{{$examination->lesson->id}}">{{ $examination->lesson->name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="title">Question</label>
                                </div>
                                <div class="nk-int-st">
                                    <select multiple class="form-control question_ids" name="question_ids[]" hidden>
                                        @foreach($questions as $question)
                                            <option value="{{ $question->id }}" selected>{{ $question->content }}</option>
                                        @endforeach
                                    </select>
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
    @include('admin.examinations.scripts')
@stop
