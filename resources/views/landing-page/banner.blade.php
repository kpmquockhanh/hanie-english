<style>
    .btn-course-regist {
        position: absolute;
        bottom: 10px;
        right: 10px;
        z-index: 99;
    }
    .banner-section {
        position: relative;
    }
    .full-height {
        width: unset !important;
        height: 100vh !important;
    }
</style>
<div class="banner-section" id="banner-section">
    <div class="owl-carousel owl-carousel-banner">
        @foreach ($bannerImgs as $banner)
            <div class="">
                <img src="{{ $banner->imageUrl }}" alt="Image" class="img-fluid">
            </div>
        @endforeach
    </div>
    <div class="btn-course-regist">
        <a href="#" class="btn btn-pill btn-info">Đăng kí khoá học</a>
    </div>
</div>