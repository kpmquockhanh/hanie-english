<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    @include('landing-page.head')
    <style>

        /*
         CSS for the main interaction
        */
        .tabset > input[type="radio"] {
            position: absolute;
            left: -200vw;
        }

        .tabset .tab-panel {
            display: none;
        }

        .tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
        .tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
        .tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
        .tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
        .tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
        .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
            display: block;
        }

        /*
         Styling
        */
        body {
            font: 16px/1.5em "Overpass", "Open Sans", Helvetica, sans-serif;
            color: #333;
            font-weight: 300;
        }

        .tabset > label {
            position: relative;
            display: inline-block;
            padding: 15px 15px 25px;
            border: 1px solid transparent;
            border-bottom: 0;
            cursor: pointer;
            font-weight: 600;
        }

        .tabset > label::after {
            content: "";
            position: absolute;
            left: 15px;
            bottom: 10px;
            width: 22px;
            height: 4px;
            background: #8d8d8d;
        }

        .tabset > label:hover,
        .tabset > input:focus + label {
            color: #06c;
        }

        .tabset > label:hover::after,
        .tabset > input:focus + label::after,
        .tabset > input:checked + label::after {
            background: #06c;
        }

        .tabset > input:checked + label {
            border-color: #ccc;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
        }

        .tab-panel {
            padding: 30px 0;
            border-top: 1px solid #ccc;
        }

        .tabset {
            max-width: 65em;
        }
    </style>
</head>

<body id="top">

@include('landing-page.header')

@include('landing-page.home')

@include('landing-page.about')

@include('landing-page.services')

@include('landing-page.general')

@include('landing-page.courses2')

@include('landing-page.courses')

{{--@include('landing-page.portfolio')--}}

@include('landing-page.testimonials')

{{--@include('landing-page.clients')--}}

@include('landing-page.footer')

<div id="preloader">
    <div id="loader"></div>
</div>

@include('landing-page.scripts')

</body>

</html>