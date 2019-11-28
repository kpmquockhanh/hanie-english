<div class="d-flex align-items-center" id="levels-section" style="height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="text-white section-title m-0">Các levels để giao tiếp thành thạo</h2>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="owl-carousel col-12 mt-3">
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
                            <input type="button" class="btn btn-course btn-sm btn-info btn-pill" value="Tìm hiểu khoá học" id="active-about-model"
                                   data-name="{{ $level->title }}"
                                   data-id="{{ $level->id }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
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
</style>