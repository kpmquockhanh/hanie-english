<header class="site-navbar py-2 js-sticky-header site-navbar-target" role="banner">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="site-logo mr-auto">
                <a href="#">
                    <img src="{{ asset('logo.png') }}" alt="" style="width: 25px;">
                </a>
            </div>
            <div class="mx-auto text-center">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                        <li><a href="#about-section" class="nav-link">Giới thiệu</a></li>
                        <li><a href="#home-section" class="nav-link">Trang chủ</a></li>
                        <li><a href="#levels-section" class="nav-link">Khoá học</a></li>
                        <li><a href="#teachers-section" class="nav-link">Giảng viên</a></li>
                        <li><a href="#job-section" class="nav-link">Tuyển dụng</a></li>
                    </ul>
                </nav>
            </div>
            <div class="ml-auto d-none d-md-block">
                <nav class="site-navigation position-relative text-right" role="navigation" style="display: flex; justify-content: center;">
                    @foreach ($social_links as $social_link)
                        <a href="{{ $social_link->content }}" target="_blank" class="nav-link social-link" style="font-size: 25px;">
                            @switch($social_link->name)
                                @case('fb_link')
                                    <i class="fab fa-facebook-square"></i>
                                @break
                                @case('ig_link')
                                    <i class="fab fa-instagram"></i>
                                @break
                                @case('yt_link')
                                    <i class="fab fa-youtube"></i>
                                @break
                            @endswitch

                        </a>

                    @endforeach

                </nav>
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right">
                    <span class="icon-menu h3"></span>
                </a>
            </div>
        </div>
    </div>
</header>
<style>
    .social-link:hover {
        color: #17a2b8;
    }
</style>