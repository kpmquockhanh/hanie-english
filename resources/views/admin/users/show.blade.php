@extends('admin.layouts.master')
@section('style')
    <style>
        .dash-circle{
            width: 10vw;
            height: 10vw;
            background: #eee;
            margin: 20px auto;
            border-radius: 50%;
            /* border: 3px dashed white; */
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            /*cursor: pointer;*/
            overflow: hidden;
            box-shadow: 1px 1px 5px;
        }
    </style>
    <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@stop
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ ucfirst((request()->segment(3)?request()->segment(3).' ':'').request()->segment(2)) }}</h3>
        </div>
        <!-- /.box-header -->
        <form action="{{ route('users.make-course') }}" method="post" class="">
            <div class="box-body">
                @include('admin.layouts.error-message')
                @csrf
                <input type="text" hidden value="{{ $user->id }}" name="user_id">

                <div class="row" style="display: flex;">
                    <div class="col-lg-6" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div>Name: <strong>{{ $user->name }}</strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>Active: <span class="text-{{ $user->status?'success':'danger' }}">{{ $user->status_name }}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="dash-circle">
                            <img id="preview-img" src="{{ $user->avatar ? asset($user->avatar) : asset('dist/img/user2-160x160.jpg') }}" alt="" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">{{ $user->name }}'s courses</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select multiple class="form-control user-courses" name="courses[]" hidden>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" selected>{{ $course->name }} ({{ $course->id }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info" style="margin-top: 20px; text-align: center">Update</button>
                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-secondary" style="margin-top: 20px; text-align: center">Edit user</a>
                <a class="btn btn-warning pull-right" href="{{ route(request()->segment(2).'.index') }}" style="margin: 20px 0 0 10px; text-align: center; ">Back</a>
            </div>
        </form>
    </div>
@stop
@section('script')
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $('.user-courses').select2({
            placeholder: 'Select an option',
            allowClear: true,
            // maximumSelectionLength: 3,
            width: 'resolve',
            ajax: {
                url: "{{ route('courses.index') }}",
                dataType: 'json',
                quietMillis: 250,
                delay: 250,
                data: function (params) {
                    const selectedCourses = $('.user-courses').val();
                    const query = {
                        q: params.term,
                        except: selectedCourses
                    };

                    return query;
                },
                cache: true
            },
        });
    </script>
@stop
