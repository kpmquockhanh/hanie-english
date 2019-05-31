@extends('admin.layouts.master')
@section('page-header', 'Phones')
@section('option-des', 'Thêm số điện thoại')
@section('content')
    <div class="container">
        <form action="{{ route('phones.store') }}" method="post" class="">
            @csrf
            <div class="row">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    @if ($errors->first())
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                                <input type="text" name="name" class="form-control" placeholder="Phone's Name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-next"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="{{ old('word') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; justify-content: center">
                <button type="submit" class="btn btn-success" style="margin-top: 20px; text-align: center">Create</button>
                <a class="btn btn-warning" href="{{ route('phones.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
            </div>

        </form>
    </div>
@stop
