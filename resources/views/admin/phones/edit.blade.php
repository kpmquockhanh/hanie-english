@extends('admin.layouts.master')
@section('style')
    <style>
        .dash-circle {
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
            <form action="{{ route('phones.update', $phone->id) }}" method="post" class="">
                @csrf
                <input type="text" name="_method" value="PUT" hidden>
                <div class="row">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        @if ($errors->first())
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Your Teacher's Name" value="{{ $phone->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" placeholder="Words" name="phone_number"
                                           value="{{ $phone->phone_number }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center">
                    <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Update
                    </button>
                    <a class="btn btn-warning" href="{{ route('courses.index') }}"
                       style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
                </div>

            </form>

        </div>
    </div>

@stop
