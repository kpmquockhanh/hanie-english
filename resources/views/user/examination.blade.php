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
@endsection
@section('option-des')
    lesson {{ $lesson->name }}
@stop
@section('content')
    <div class="row">
        <div class="text-center title">
            <p>Examination</p>
        </div>
    </div>
    <div class="box-footer">
        <form action="" method="post">
            @csrf
            @foreach($arrQuestion as $key => $question)
                <div class="col-md-12">
                    <p style="margin: 10px; font-weight: bold">Question {{ ++$key }}: {{$question[0]->content}}</p>
                </div>
                <div class="col-md-12">
                    <div class="box-body">
                        @include('admin.layouts.flash-message')
                        @include('admin.layouts.error-message')
                        @csrf
                        <div class="row">
                            @foreach($question[1] as $answer)
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="checkbox" name="answer[]" id="{{$answer->id}}"
                                               value="{{$question[0]->id}}_{{$answer->id}}"> {{$answer->content}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Submit
                </button>
            </div>
        </form>
    </div>
@endsection
@section('script')
@stop
