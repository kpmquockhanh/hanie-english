<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hanie English</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        .site-wrap {
            background-color: #efa189;
        }
        #contact a:hover {
            color: #efa189;
        }
        .text-bluecus {
            color: #17a2b8;
        }
        .site-section {
            background-color: white;
        }
        .text-pink {
            color: #efa189;
        }
    </style>
    @include('landing-page.style')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    @include('landing-page.header', ['social_links' => $social_links])
    @include('landing-page.banner')
    @include('landing-page.home')
{{--    @include('landing-page.about')--}}
    @include('landing-page.programs')
    @include('landing-page.levels')
    @include('landing-page.teachers')
    @include('landing-page.feedback')
{{--    @include('landing-page.why')--}}
    @include('landing-page.job')
    @include('landing-page.footer')
</div> <!-- .site-wrap -->
@include('landing-page.about-model')
@include('landing-page.demo-modal')
@include('landing-page.script')

</body>
{{--@include('landing-page.script-fb')--}}
</html>