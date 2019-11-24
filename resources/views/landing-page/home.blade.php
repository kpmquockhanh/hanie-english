<div class="intro-section" id="home-section">
    <div class="slide-1">
        <div class="container">
            <div class="row" style="padding-top: 20px;">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4">
                            <h1 data-aos="fade-up" data-aos-delay="100">Hanie English</br>Inspiring your English</h1>
                            <blockquote>
                                <p>{{ $configs['header_desc_1']->content }}</p>
                                <p>{{ $configs['header_desc_2']->content }}</p>
                            </blockquote>
                            <div data-aos="fade-up" class="courses-entry-wrap" id="course-section"
                                 style="margin-top: 0; padding-top: 0;">
                                <div class="row">
                                    <div class="owl-carousel carousel-overal col-12 nonloop-block-14">
                                        @foreach ($education_programs as $item)
                                            <div class="course bg-white h-100 align-self-stretch">
                                                <div class="course-inner-text py-4 px-4">
                                                    <h3>{{ $item->title }}</h3>
                                                    {!! $item->content !!}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 ml-auto pt-6" data-aos="fade-up" data-aos-delay="500" id="form-hidden">
                            <iframe class="d-none d-lg-block" height="370" src="{{ $configs['iframe_video']->content }}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <form action="{{ route('landing.store.phone') }}" method="post" class="form-box"  style="margin-top: 10px">
                                @csrf
                                <h3 class="h4 text-black mb-4">Đăng kí khoá học</h3>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your name"
                                           autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone_number"
                                           placeholder="Your phone number" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-pill" value="Đăng kí">
                                    <input type="button" class="btn btn-info btn-pill" value="Tìm hiểu khoá học" id="active-about-model">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>