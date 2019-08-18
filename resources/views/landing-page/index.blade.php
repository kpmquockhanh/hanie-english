
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hanie English</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        @font-face {
            font-family: Muli;
            src: url({{ asset('lp/fonts/Muli.ttf') }});
        }
    </style>
{{--    <link rel="stylesheet" href="{{ asset('lp/fonts/icomoon/style.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('lp/fonts/icomoon/styleMIN.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/compliedBS.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('lp/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('lp/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/style.css') }}">

    <style>
        iframe {
            width: 100%;
        }
        @media only screen and (max-width: 554px) {
            #form-hidden {
                display: none;
            }
        }
    </style>
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


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div class="site-logo mr-auto w-25"><a href="#">{{ env('APP_NAME', 'Hanie') }}</a></div>

                <div class="mx-auto text-center">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                            <li><a href="#home-section" class="nav-link">Trang chủ</a></li>
                            <li><a href="#about-section" class="nav-link">Giới thiệu</a></li>
                            <li><a href="#levels-section" class="nav-link">Levels</a></li>
                            <li><a href="#teachers-section" class="nav-link">Giảng viên</a></li>
                            <li><a href="#job-section" class="nav-link">Tuyển dụng</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="ml-auto w-25">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                            <li class="cta"><a href="#contact" class="nav-link"><span>Liên hệ với chúng tôi ngay</span></a></li>
                        </ul>
                    </nav>
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>

    </header>
    <div class="intro-section" id="home-section">

        <div class="slide-1" style="background-image: url('lp/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4">
                                <h1  data-aos="fade-up" data-aos-delay="100">Hanie English </br>
                                    Inspiring your English</h1>
                                <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">{{ $configs[0]->content }}</p>
                                <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">{{ $configs[1]->content }}</p>
                                <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">"{{ $configs[2]->content }}" - <strong><i>{{ $configs[3]->content }}</i></strong></p>
                                <p data-aos="fade-up" data-aos-delay="300"><a href="#contact" class="btn btn-primary py-3 px-5 btn-pill">Liên hệ với chúng tôi ngay</a></p>

                            </div>

                            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500" id="form-hidden">
                                <form action="{{ route('landing.store.phone') }}" method="post" class="form-box">
                                    @csrf
                                    <h3 class="h4 text-black mb-4">Đăng kí khoá học</h3>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Your name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone_number" placeholder="Your Phone number" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-pill" value="Đăng kí">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('lp/images/hero_1.jpg');" id="about-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 text-center testimony">
                    <h2 class="mb-4 text-white">Giới thiệu</h2>
                    <blockquote>
                        <p>&ldquo; Hanie English Đào tạo giao tiếp từ cơ bản đến nâng cao, kết hợp củng cố kiến thức nền vững chắc theo tiêu chuẩn quốc tế. Hiệu quả rõ rệt sau 20 ngày.&rdquo;</p>
                        <p>&ldquo; Luyện tập 4 kỹ năng, ôn thi các chứng chỉ PET, KET, TOEIC, ESOL,… &rdquo;</p>
                        {!! $configs[4]->content !!}
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="programs-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">Hình Thức Đào Tạo</h2>
                    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>--}}
                </div>
            </div>
            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img data-original="lp/images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Hình thức học</h2>
                    <p class="mb-4">Hình thức 1 gia sư theo sát 1 học viên, giải đáp mọi thắc mắc của học viên.</p>

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap mb-3">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>--}}
                    {{--                        <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>--}}
                    {{--                        <div><h3 class="m-0">150 Universities Worldwide</h3></div>--}}
                    {{--                    </div>--}}

                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img data-original="lp/images/undraw_teaching.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Thời gian</h2>
                    <p class="mb-4">Thời gian dạy và học linh hoạt dựa vào khoảng thời gian phù hợp với học viên, mọi lúc mọi nơi, uy tín và đảm bảo chất lượng.</p>

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap mb-3">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>--}}
                    {{--                        <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>--}}
                    {{--                        <div><h3 class="m-0">150 Universities Worldwide</h3></div>--}}
                    {{--                    </div>--}}

                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img data-original="lp/images/undraw_teacher.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Giảng viên</h2>
                    <p class="mb-4">Các gia sư online có trình độ và đã trải qua khóa training khắt khe về chuyên môn cũng như kỹ năng giảng dạy.</p>

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap mb-3">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>--}}
                    {{--                        <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>--}}
                    {{--                        <div><h3 class="m-0">150 Universities Worldwide</h3></div>--}}
                    {{--                    </div>--}}

                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img data-original="lp/images/undraw_teaching.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Phù hợp với</h2>
                    <p class="mb-4">Đối tượng học sinh: Người đi làm, du học sinh, …</p>

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap mb-3">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>--}}
                    {{--                        <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="d-flex align-items-center custom-icon-wrap">--}}
                    {{--                        <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>--}}
                    {{--                        <div><h3 class="m-0">150 Universities Worldwide</h3></div>--}}
                    {{--                    </div>--}}

                </div>
            </div>

        </div>
    </div>
    {!! $configs[5]->content !!}
    {!! $configs[7]->content !!}


    <div class="site-section" id="teachers-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">Giảng viên của chúng tôi</h2>
{{--                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>--}}
                </div>
            </div>

            <div class="row">
                @foreach ($teachers as $teacher)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="teacher text-center">
                            <img data-original="{{ asset($teacher->url_image ?? 'lp/images/person_1.jpg') }}" alt="Image" class="img-fluid mx-auto mb-4" style="border-radius: 5px;">
                            <div class="py-2">
                                <h3 class="text-black">{{ $teacher->name }}</h3>
                                <p class="position">{{ $teacher->position }}</p>
                                <p>{{ $teacher->word }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {!! $configs[6]->content !!}
{{--    <div class="site-section pb-0">--}}

{{--        <div class="future-blobs">--}}
{{--            <div class="blob_2">--}}
{{--                <img src="lp/images/blob_2.svg" alt="Image">--}}
{{--            </div>--}}
{{--            <div class="blob_1">--}}
{{--                <img src="lp/images/blob_1.svg" alt="Image">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">--}}
{{--                <div class="col-lg-7 text-center">--}}
{{--                    <h2 class="section-title">Tại sao chọn chúng tôi</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">--}}

{{--                    <div class="p-4 rounded bg-white why-choose-us-box">--}}

{{--                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">--}}
{{--                            <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>--}}
{{--                            <div><h3 class="m-0">22,931 Yearly Graduates</h3></div>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">--}}
{{--                            <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>--}}
{{--                            <div><h3 class="m-0">150 Universities Worldwide</h3></div>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">--}}
{{--                            <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>--}}
{{--                            <div><h3 class="m-0">Top Professionals in The World</h3></div>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">--}}
{{--                            <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>--}}
{{--                            <div><h3 class="m-0">Expand Your Knowledge</h3></div>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">--}}
{{--                            <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>--}}
{{--                            <div><h3 class="m-0">Best Online Teaching Assistant Courses</h3></div>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">--}}
{{--                            <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>--}}
{{--                            <div><h3 class="m-0">Best Teachers</h3></div>--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                </div>--}}
{{--                <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">--}}
{{--                    <img src="lp/images/person_transparent.png" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="site-section bg-light" id="job-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7">

                    <h2 class="section-title mb-3">Tuyển dụng</h2>
                    <p class="mb-5">
                        Nếu bạn quan tâm tới các vị trí tuyển chọn của chúng tôi vui lòng điền vào biểu mẫu phía
                    </p>

                    <form method="post" data-aos="fade" action="{{ route('landing.store.job') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Tên" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="" cols="30" rows="10" placeholder="Ghi thông điệp tại đây" name="message"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Gửi yêu cầu">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer-section bg-white" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>About HANIE ENGLISH.</h3>
                    <p>Địa chỉ: Tầng 6 số nhà 22 ngõ 79/14 Dương Quảng Hàm, Cầu Giấy, Hà Nội</p>
                    <p><span class="icon icon-phone"></span> Hotline: 0918199264</p>
                    <p><span class="icon icon-add_box"></span> hanie.english.edu@gmail.com</p>
                </div>

                <div class="col-md-3 ml-auto">
                    <h3>THEO DÕI CHÚNG TÔI</h3>
                    <ul class="list-unstyled footer-links">
                        <li><a href="https://www.facebook.com/Ngh%E1%BB%87-Thu%E1%BA%ADt-Chinh-Ph%E1%BB%A5c-Ti%E1%BA%BFng-Anh-1839176996210179/">Facebook</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h3>Nhận thông báo</h3>
                    <p>Điền số điện để chúng tôi có thể thông báo cho bạn những khóa học quan trọng một cách nhanh nhất.</p>
                    <form action="{{ route('landing.store.phone') }}" class="footer-subscribe">
                        @csrf
                        <div class="d-flex mb-5 flex-column">
                            <input type="text" class="form-control rounded-0" placeholder="Tên của bạn" name="name" autocomplete="off">
                            <input type="text" class="form-control rounded-0" placeholder="Số điện thoại" name="phone_number" autocomplete="off">
                            <input type="submit" class="btn btn-primary rounded-0" value="Đăng kí">
                        </div>
                    </form>
                </div>

            </div>

            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Hanie English.
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>



</div> <!-- .site-wrap -->

<script src="{{ asset('lp/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery-ui.js') }}"></script>
<script src="{{ asset('lp/js/popper.min.js') }}"></script>
<script src="{{ asset('lp/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('lp/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('lp/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('lp/js/aos.js') }}"></script>
<script src="{{ asset('lp/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery.sticky.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
        integrity="sha256-rXnOfjTRp4iAm7hTAxEz3irkXzwZrElV2uRsdJAYjC4=" crossorigin="anonymous">
</script>


<script src="{{ asset('lp/js/main.js') }}"></script>
<script>
    $("img").lazyload();
</script>
</body>
</html>