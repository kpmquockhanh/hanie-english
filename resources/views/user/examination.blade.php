@extends('user.layouts.master')
@section('style')
    <style>
        .title {
            border-bottom: 2px solid red;
            margin: 0 20px;
        }

        .title > p {
            font-size: 30px;
            color: #00acd6;
        }

        input[type=checkbox] {
            margin-right: 10px !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/flipclock.css') }}">
@endsection
@section('option-des')
    Examination "{{ $lesson->name }}"
@stop
@section('content')
{{--    <div class="row">--}}
{{--        <div class="text-center title">--}}
{{--            <p>Examination</p>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="clock" style="display: flex; justify-content: center"></div>
<form action="" method="post" id="examination">
    @csrf
    <div class="row">
        @foreach($arrQuestion as $key => $question)
            <div class="col-lg-4">
                <div class="box box-success">
                    <div class="box-header">
                        <strong>Question: </strong>{{ $question[0]->content }} ?
                    </div>
                    <div class="box-body">
                        @include('admin.layouts.flash-message')
                        @include('admin.layouts.error-message')
                        <div class="row">
                            @foreach($question[1] as $answer)
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="radio" name="answer_for_{{ $question[0]->id }}" id="{{ $question[0]->id.'_'.$answer->id }}"
                                               value="{{$answer->id}}">
                                        <label for="{{ $question[0]->id.'_'.$answer->id }}" style="font-weight: normal; margin-left: 10px">{{$answer->content}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
{{--        <div class="box-footer text-center">--}}
{{--            <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Submit--}}
{{--            </button>--}}
{{--        </div>--}}
    </div>
    <div class="row">
        <div class="" style="display: flex; justify-content: center">
            <button type="submit" class="btn btn-success" name="submit" value="finish">Submit</button>
        </div>
    </div>
</form>
@endsection
@section('script')
    <script src="{{ asset('node_modules/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('js/flipclock.min.js') }}"></script>

    <script>
        var clock = $('.clock').FlipClock({{ $score->second }}, {
            clockFace: 'MinuteCounter',
            countdown: true
        });
        setInterval(submitResult, 3000);

        function submitResult() {
            const data = new FormData(document.getElementById('examination'));
            axios({
                method: 'POST',
                url: '{{ route('dashboard.examination', $lesson->id) }}',
                responseType: 'json',
                data,
                headers: {
                    'Content-Type': 'application/json',
                }
            })
        }
    </script>
@stop
