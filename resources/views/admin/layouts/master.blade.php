
<!doctype html>
<html class="no-js" lang="">

<head>
    @include('admin.layouts.style')
    @yield('style')
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
@include('admin.layouts.header')

@yield('content')

@include('admin.layouts.footer')
@yield('script')
</body>

</html>