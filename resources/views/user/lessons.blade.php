@extends('user.layouts.master')
@section('style')
@endsection
@section('option-des')
    available lessons
@stop
@section('content')
    <div class="row">
        @if (!count($course->lessons))
            <div class="col-lg-12">
                <div class="alert alert-warning">
                    <h4><i class="icon fa fa-warning"></i> No data!</h4>
                    Have any lessons
                </div>
            </div>
        @endif
       @foreach ($course->lessons as $lesson)
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        {{ $lesson->name }}

                    </div>
                    <div class="box-body">
                        <div>
                            <i>{!! $course->description !!}</i>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('dashboard.study', [$lesson->id]) }}" class="btn-sm btn-success">Study this lesson</a>
                        <a href="" class="btn-sm btn-info">Make a test</a>
                        {{--<a href="" class="btn-sm btn-danger">Cancel, be careful!</a>--}}
                    </div>
                </div>
            </div>
       @endforeach
    </div>
@endsection
@section('script')
@stop