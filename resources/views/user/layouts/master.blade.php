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
    @include('user.layouts.style')
    @yield('style')
</head>
<body class="hold-transition skin-red-light fixed">
<div class="wrapper">

    @include('user.layouts.header')
    @include('user.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ ucfirst(request()->segment(2) ?? env('APP_NAME'))}}
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

    @include('user.layouts.footer')
</div>
<!-- ./wrapper -->

@include('user.layouts.script')
@yield('script')
</body>
</html>