@extends('admin.layouts.master')
@section('page-header', 'Phones')
@section('option-des', 'Edit phone')
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit phone {{$phone->name}}</h3>
        </div>
        <form action="{{ route('phones.update', $phone->id) }}" method="post" class="">
            @csrf
            <input type="text" name="_method" value="PUT" hidden>
            <div class="box-body">
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
                                    <label for="name">Name</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Your Teacher's Name" value="{{ $phone->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <label for="phone_number">Phone number</label>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" placeholder="Words" name="phone_number"
                                           value="{{ $phone->phone_number }}">
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
