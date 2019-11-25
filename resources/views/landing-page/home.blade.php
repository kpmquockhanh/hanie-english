<div class="intro-section" id="home-section">
    <div class="slide-1">
        <div class="container">
            <div class="row" style="padding-top: 20px;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <h1 data-aos="fade-up" data-aos-delay="100">Hanie English</br>Inspiring your English</h1>
                            <blockquote data-aos="fade-up" data-aos-delay="200">
                                <p class="text-white">{{ $configs['header_desc_1']->content }}</p>
                                <p class="text-white">{{ $configs['header_desc_2']->content }}</p>
                                @foreach ($education_programs as $item)
                                    <div>
                                        <div class="display-5">{{ $item->title }}</div>
                                        <p class="text-white">{!! $item->content !!}</p>
                                    </div>

                                @endforeach
                            </blockquote>
                        </div>
                        <div class="col-lg-3">
                            <div class="display-2 text-white d-none d-lg-block" data-aos="fade-up" >Giới thiệu</div>
                        </div>

{{--                        <div class="col-lg-6 ml-auto pt-6" data-aos="fade-up" data-aos-delay="500" id="form-hidden">--}}
{{--                            <iframe class="d-none d-lg-block" height="370" src="{{ $configs['iframe_video']->content }}" frameborder="0"--}}
{{--                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
{{--                                    allowfullscreen></iframe>--}}
{{--                            <form action="{{ route('landing.store.phone') }}" method="post" class="form-box"  style="margin-top: 10px">--}}
{{--                                @csrf--}}
{{--                                <h3 class="h4 text-black mb-4">Đăng kí khoá học</h3>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="text" class="form-control" name="name" placeholder="Your name"--}}
{{--                                           autocomplete="off">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="text" class="form-control" name="phone_number"--}}
{{--                                           placeholder="Your phone number" autocomplete="off">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="submit" class="btn btn-primary btn-pill" value="Đăng kí">--}}
{{--                                    <input type="button" class="btn btn-info btn-pill" value="Tìm hiểu khoá học" id="active-about-model">--}}
{{--                                </div>--}}
{{--                            </form>--}}

{{--                        </div>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>