@extends('admin.layouts.master')
@section('page-header', 'Examinations')
@section('option-des', 'Create examination')
@section('style')
    <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
@stop
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create Examination</h3>
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
                                    <label for="title">Lesson name</label>
                                </div>
                                <div class="nk-int-st">
                                    <select class="form-control lessons" name="lesson_id" hidden></select>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Create
                </button>
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
