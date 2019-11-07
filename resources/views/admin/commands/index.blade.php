@extends('admin.layouts.master')
{{--@section('page-header', 'Examinations')--}}
{{--@section('option-des', 'Examinations')--}}
@section('style')
    <style>
        .w-100 {
            width: 100% !important;
        }
        .mb {
            margin-bottom: 10px;
        }
        .d-none {
            display: none;
        }
    </style>
@stop
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Commands list</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row mb">
                <div class="col-lg-4">
                    <a class="btn btn-danger w-100 btn-command" data-command="clear-cache">Clear cache</a>
                </div>
                <div class="col-lg-4">
                    <a class="btn btn-danger w-100 btn-command" data-command="clear-route-cache">Clear route cache</a>
                </div>
                <div class="col-lg-4">
                    <a class="btn btn-danger w-100 btn-command" data-command="clear-optimize">Clear optimize</a>
                </div>
            </div>
            <div class="row mb">
{{--                <div class="col-lg-4">--}}
{{--                    <a class="btn btn-danger w-100 btn-command" data-command="fresh-migrate">Fresh migrate</a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <a class="btn btn-danger w-100 btn-command" data-command="migrate">Migrate</a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <a class="btn btn-danger w-100 btn-command" data-command="runSeed">Run seed</a>--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@stop
@section('script')
    <script src="{{ asset('node_modules/axios/dist/axios.min.js') }}"></script>
    <script>
        $('.btn-command').click(function (e) {
            e.preventDefault();
            const _this = $(this);
            const command = _this.data('command');
            const gear = '<i class="fa fa-gear fa-spin"></i>';
            const content = _this.html();
            _this.html(gear);
            axios.post(
              `/admin/commands/${command}`
            ).then(result => {
                if (result.status === 200) {
                    // Success
                    _this.html(content);
                }
            }).catch(e => {
                console.log(e)
                alert('Error');
                _this.html(content);
            });
        });
    </script>
@stop
