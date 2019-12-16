<div class="d-flex align-items-center" id="levels-section">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="text-white section-title m-0">Các khoá học cơ bản</h2>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="d-flex justify-content-center w-100">
                <div class="row py-4 w-100">
                    @foreach ($levels as $index => $level)
                        <div class="col-lg-6 mb-3">
                            <div class="card {{ $index % 3 == 0 ? '' : 'green' }}">
                                <div class="additional">
                                    <div class="user-card">
                                        <h4 class="text-white d-flex justify-content-center align-items-center h-100">
                                            {{ $level->title }}
                                        </h4>
                                    </div>
                                    <div class="more-info">
                                        <div class="h-100">
                                            <div class="title">{{ $level->title }}</div>
                                            <div class="coords">
                                                {!! $level->desc !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="general">
                                    <div class="title">{{ $level->title }}</div>
                                    <div style="margin: 0 1rem;">{!! $level->desc !!}</div>
                                    <div class="special-link">
                                        <input type="button" class="btn btn-course btn-sm btn-info btn-pill w-100" value="Tìm hiểu khoá học" id="active-about-model"
                                               data-name="{{ $level->title }}"
                                               data-id="{{ $level->id }}"
                                                style="cursor:pointer;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>




{{--<div class="d-flex align-items-center" id="levels-section" style="height: 100vh">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">--}}
{{--                <h2 class="text-white section-title m-0">Các khoá học cơ bản</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row" data-aos="fade-up">--}}
{{--            <div class="owl-carousel col-12 mt-3">--}}
{{--                @foreach ($levels as $level)--}}
{{--                    <div class="course bg-white h-100 align-self-stretch">--}}
{{--                        <figure class="m-0">--}}
{{--                            <a href="#"><img src="{{ $level->url_image }}" alt="Image" class="img-fluid"></a>--}}
{{--                        </figure>--}}
{{--                        <div class="course-inner-text py-4 px-4">--}}
{{--                            <div class="meta"><span class="icon-clock-o"></span>{{ $level->lesson_number }} Lessons / {{ $level->duration_by_week }} week</div>--}}
{{--                            <h3><a href="#">{{ $level->title }}</a></h3>--}}
{{--                            <div>--}}
{{--                                {!! $level->desc !!}--}}
{{--                            </div>--}}
{{--                            <input type="button" class="btn btn-course btn-sm btn-info btn-pill" value="Tìm hiểu khoá học" id="active-about-model"--}}
{{--                                   data-name="{{ $level->title }}"--}}
{{--                                   data-id="{{ $level->id }}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<style>
    .owl-carousel .owl-item img {
        border-radius: 5px 5px 0 0;
    }
    .course {
        border-radius: 5px;
    }
    .btn-course {
        font-size: 9px;
        padding: 9px 14px;
    }
    .title {
        font-size: 40px;
    }
    .special-link {
        position: absolute;
        width: 70%;
        left: 15%;
        bottom: 10px;
        z-index: 999;
    }
</style>