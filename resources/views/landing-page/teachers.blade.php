<div class="site-section" id="teachers-section">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Giảng viên của chúng tôi</h2>
                {{--                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>--}}
            </div>
        </div>

        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="teacher text-center">
                        <img data-original="{{ asset($teacher->url_image ?? 'lp/images/person_1.jpg') }}"
                             alt="Image" class="img-fluid mx-auto mb-4" style="border-radius: 5px;">
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