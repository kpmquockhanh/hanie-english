<div class="site-section pb-0">

    <div class="future-blobs">
        <div class="blob_2">
            <img src="lp/images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
            <img src="lp/images/blob_1.svg" alt="Image">
        </div>
    </div>
    <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
        </div>
        <div class="row">
            @foreach ($feedbacks as $feedback)
                <div class="col-lg-4 m-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 rounded bg-white why-choose-us-box">
                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                            <div>
                                <h2 class="m-0">{{ $feedback->name }}</h2>
                                <div>
                                    {!! $feedback->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>