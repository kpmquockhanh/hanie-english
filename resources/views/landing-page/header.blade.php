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
            <div class="ml-auto w-25 d-none d-md-block">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <a href="#contact" class="nav-link btn btn-pill btn-primary"><span>Liên hệ với chúng tôi</span></a>
                </nav>
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                            class="icon-menu h3"></span></a>
            </div>
        </div>
    </div>
</header>