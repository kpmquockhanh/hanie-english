@extends('user.layouts.master')
@section('style')
@endsection
@section('option-des')
    your lessons
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
        <div class="col-lg-12">
            @include('admin.layouts.flash-message')
            @include('admin.layouts.error-message')
        </div>
        @foreach ($course->lessons as $lesson)
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <div>
                            {{ $lesson->name }}
                        </div>
                        <div class="pull-right">
                            <strong>
                                <i>{{ $lesson->count }} time(s)</i>
                            </strong>
                        </div>
                    </div>
                    <div class="box-body">
                        <div>
                            <i>{!! $course->description !!}</i>
                        </div>
                    </div>
                    <div class="box-footer">
                        @if ($lesson->count < 3)
                            <a href="{{ route('dashboard.study', [$lesson->id]) }}" class="btn-sm btn-success">Study this lesson</a>
                        @endif
                        @if (!$lesson->score || $lesson->score->end_at >= \Carbon\Carbon::now())
                            @if ($lesson->examination)
                                <a href="{{ route('dashboard.examination', $lesson->id) }}" class="btn-sm btn-info">
                                    @if ($lesson->score && $lesson->score->end_at)
                                        Continue your test
                                    @else
                                        Make a test
                                    @endif
                                </a>
                            @else
                                    <button class="btn-sm btn-secondary" disabled>No test</button>
                            @endif
                        @elseif ($lesson->score->end_at < \Carbon\Carbon::now())
                            <button class="btn-sm btn-danger" disabled="">Test result: <strong>{{ $lesson->score->score }}</strong> point(s)</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
@stop