<div class="intro-section" id="home-section">
    <div class="slide-1" style="background-image: url('lp/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4">
                            <h1 data-aos="fade-up" data-aos-delay="100">Hanie English </br>
                                Inspiring your English</h1>
                            <blockquote>
                                <p>&ldquo; Hanie English Đào tạo giao tiếp từ cơ bản đến nâng cao, kết hợp củng cố
                                    kiến thức nền vững chắc theo tiêu chuẩn quốc tế. Hiệu quả rõ rệt sau 20 ngày.&rdquo;</p>
                                <p>&ldquo; Luyện tập 4 kỹ năng, ôn thi các chứng chỉ PET, KET, TOEIC, ESOL,…
                                    &rdquo;</p>
                            </blockquote>
                            <div data-aos="fade-up" class="site-section courses-entry-wrap" id="course-section"
                                 style="margin-top: 0; padding-top: 0; height: 50vh;">
                                <div class="row">
                                    <div class="owl-carousel carousel-overal col-12 nonloop-block-14">
                                        <div class="course bg-white h-100 align-self-stretch">
                                            <div class="course-inner-text py-4 px-4">
                                                <h3>Luyện thi PET, KET, TOEIC</h3>
                                                <p>Mô hình chuẩn châu âu: từ STARTERS, MOVERS, FLYERS TOEIC VỚI 4 KỸ
                                                    NĂNG TỪ 350 ĐẾN 750 - 800 TRONG VÒNG 3 ĐẾN 6 THÁNG</p>
                                            </div>
                                        </div>
                                        <div class="course bg-white h-100 align-self-stretch">
                                            <div class="course-inner-text py-4 px-4">
                                                <h3>Giảng viên</h3>
                                                <p>Giảng viên nhiệt tình, luôn theo sát học viên trong từng buổi
                                                    học, và trong suốt khóa học
                                                <p>Tất cả các giảng viên đều được đào tạo bài bản chuyên nghiệp</p>
                                                <p>Có kỹ năng sư phạm</p>
                                                <p>Có kinh nghiệm giảng dạy - Có bằng Toeic, IELTS, B2, TESOL</p>
                                                <p>Được đào tạo từ khoa ngoại ngữ của các trường đại học: Đại học
                                                    ngoại ngữ Hà Nội, Đại học Thương Mại,...</p>
                                            </div>
                                        </div>
                                        <div class="course bg-white h-100 align-self-stretch">
                                            <div class="course-inner-text py-4 px-4">
                                                <h3>Phương pháp</h3>
                                                <p>Phương pháp luyện nghe</p>
                                                <p>Được chia thành 3 giai đoạn : Pre-listening, While-listening,
                                                    Post-listening</p>
                                                <p>Với 3 bước này sẽ hỗ trợ học viên nghe hiểu sâu và bắt được nghĩa
                                                    của bài 1 cách rõ ràng nhất, và có khả năng diễn đạt ý tưởng của
                                                    câu chuyện theo cách hiểu của bản thân</p>
                                            </div>
                                        </div>
                                        <div class="course bg-white h-100 align-self-stretch">
                                            <div class="course-inner-text py-4 px-4">
                                                <h3>Phương pháp dạy “SPEAKING”</h3>
                                                <p>Role-play: Học viên và giáo viên đóng vai nhân vật trong một ngữ
                                                    cảnh nhất định để luyện tập kĩ năng nói. Học viên được cung cấp
                                                    từ mới, cấu trúc câu để hiểu tường tận bài nói, chỉnh sửa ngữ âm
                                                    giúp học viên nói đúng ngữ điệu.</p>
                                                <p>Sử dụng tiếng anh tối đa để giao tiếp trong lớp học lợi ích của
                                                    việc sử dụng tiếng anh trong lớp: Giúp học viên luyện nghe và
                                                    nói một cách trôi chảy, tự nhiên nhất có thể</p>
                                                <p>Đưa cho học sinh cảm giác tiếng anh là một ngôn ngữ để giao tiếp
                                                    thực sự chứ không phải là một ngôn ngữ trên sách vở, hay là học
                                                    vẹt</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 ml-auto pt-6" data-aos="fade-up" data-aos-delay="500" id="form-hidden">
                            <iframe height="370" src="{{ $configs['iframe_video']->content }}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <form action="{{ route('landing.store.phone') }}" method="post" class="form-box">
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