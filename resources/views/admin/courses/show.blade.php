@extends('admin.layouts.master')
@section('page-header', 'Courses')
@section('option-des', "Information course")
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Information course {{$course->name}}</h3>
        </div>
        <div class="box-body">

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
                    <label for="name">Name</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <p>{{$course->name}}</p>
                </div>
            </div>
            <div class="col-md-12" style="display: flex; justify-content: center">
                <div class="col-md-2">
                    <label for="name">Description</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <p>{!! $course->description !!}</p>
                </div>
            </div>
            <div class="col-md-12" style="display: flex; justify-content: center">
                <div class="col-md-2">
                    <label for="name">Lessons</label>
                </div>
               <div class="col-md-10">
                   @foreach ($course->lessons as $lesson)
                       <div class="col-lg-1 no-padding">
                           <a class="badge badge-success" href="{{ route('lessons.edit', $lesson->id) }}">{{ $lesson->name }}</a>
                       </div>
                   @endforeach
               </div>
            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-warning" href="{{ route('courses.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
        </div>
    </div>
@stop
