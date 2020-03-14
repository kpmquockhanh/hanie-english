<div class="site-section bg-light" id="job-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-7">

                <h2 class="section-title mb-3">Tuyển dụng</h2>
                <p class="mb-5">
                    Nếu bạn quan tâm tới các vị trí tuyển chọn của chúng tôi vui lòng điền vào biểu mẫu phía
                </p>

                <form method="post" data-aos="fade" action="{{ route('landing.store.job') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Tên" name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                                <textarea class="form-control" id="" cols="30" rows="10"
                                          placeholder="Ghi thông điệp tại đây" name="message"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill"
                                   value="Gửi yêu cầu">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>