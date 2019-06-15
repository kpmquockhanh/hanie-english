@extends('user.layouts.master')
@section('style')
@endsection
@section('option-des')
    List courses
@stop
@section('content')
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        {{ $course->name }}
                    </div>
                    <div class="box-body">
                        <div>
                            <i>{!! str_limit($course->description, 100) !!}</i>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="" class="btn-sm btn-info">Study this course!</a>
                        <a href="" class="btn-sm btn-success">Make a test</a>
                        <a href="" class="btn-sm btn-outline-danger">Course detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
@stop