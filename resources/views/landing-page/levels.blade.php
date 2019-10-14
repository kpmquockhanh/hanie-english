<div class="site-section courses-title" id="levels-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Các levels để giao tiếp thành thạo</h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100" id="course-section">
    <div class="container">
        <div class="row">
            <div class="owl-carousel col-12 nonloop-block-14">
                @foreach ($levels as $level)
                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="#"><img src="{{ $level->url_image }}" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <div class="meta"><span class="icon-clock-o"></span>{{ $level->lesson_number }} Lessons / {{ $level->duration_by_week }} week</div>
                            <h3><a href="#">{{ $level->title }}</a></h3>
                            <div>
                                {!! $level->desc !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                <button class="customNextBtn btn btn-primary m-1">Next</button>
            </div>
        </div>
    </div>
</div>