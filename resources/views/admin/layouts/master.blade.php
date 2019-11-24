<!DOCTYPE html>
<html lang="vi">
<head>
    @if (request()->segment(2))
        <title>{{ env('APP_NAME') }} | @yield('title', ucfirst((request()->segment(3)
        ?request()->segment(4) === 'edit'
            ?'Update '
            :request()->segment(3)
            .' ':'').request()->segment(2)))</title>
    @else
        <title>{{ env('APP_NAME') }}</title>
    @endif
    @include('admin.layouts.style')
    @yield('style')
        <style>
            .btn-sm {
                display: inline-grid;
            }
            /*.box {*/
            /*    overflow-x: auto;*/
            /*}*/
        </style>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
{{--    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fav.ico') }}"/>--}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ ucfirst(request()->segment(2)) }}
                <small>@yield('option-des', ucfirst((request()->segment(3)?request()->segment(3).' ':'').request()->segment(2)))</small>
            </h1>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            @yield('content')
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->

@include('admin.layouts.script')
@yield('script')
</body>
</html>