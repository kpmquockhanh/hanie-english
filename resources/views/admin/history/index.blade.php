@extends('admin.layouts.master')
{{--@section('page-header', 'Examinations')--}}
{{--@section('option-des', 'Examinations')--}}
@section('style')

@stop
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <li class="time-label">
                          <span class="bg-aqua">
                            {{ $histories->first()->created_at->toDateString() }}
                          </span>
                </li>
                @foreach ($histories as $index => $history)
                    @if ($index > 0 && $history->created_at->toDateString() !== $histories[$index-1]->created_at->toDateString())
                        <li class="time-label">
                          <span class="bg-aqua">
                            {{ $history->created_at->toDateString() }}
                          </span>
                        </li>
                    @endif

                    @include('admin.history.time', ['history' => $history])
                @endforeach
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop
