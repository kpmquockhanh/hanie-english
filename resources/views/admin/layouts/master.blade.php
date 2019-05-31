<!DOCTYPE html>
<html lang="vi">
<head>
    <title>{{ env('APP_NAME') }} | @yield('title', 'unnamed')</title>
    @include('admin.layouts.style')
    @yield('style')
</head>
<body class="hold-transition skin-green fixed">
<div class="wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-header', 'Page Header')
                <small>@yield('option-des', 'Optional description')</small>
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