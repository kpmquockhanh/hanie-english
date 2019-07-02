<?php

use Illuminate\Database\Seeder;

class ConfigSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Config::query()->create([
            'type' => 'text',
            'show' => true,
            'name' => 'header_desc_1',
            'content' => 'HANIE - TIẾNG ANH TRỰC TUYẾN 1 - 1 VỚI GIA SƯ CỦA RIÊNG BẠN',
        ]);

        \App\Config::query()->create([
            'type' => 'text',
            'show' => true,
            'name' => 'header_desc_2',
            'content' => 'ĐỀ XUẤT TIẾNG ANH LÀ NGÔN NGỮ THỨ HAI \'TRƯỚC SAU CŨNG PHẢI THỰC HIỆN\'
SỬ DỤNG TIẾNG ANH GÓP PHẦN NÂNG CAO GIÁ TRỊ BẢN THÂN',
        ]);
        \App\Config::query()->create([
            'type' => 'text',
            'show' => true,
            'name' => 'header_desc_3',
            'content' => 'Đến năm 2030, ít nhất 20% trường THPT giao tiếp bằng song ngữ Anh - Việt trong các hoạt động giáo dục, hoạt động tập thể, ngoại khóa và trải nghiệm sáng tạo. Khuyến khích các ngoại ngữ thông dụng khác trong hệ thống giáo dục của thành phố.',
        ]);
        \App\Config::query()->create([
            'type' => 'text',
            'show' => true,
            'name' => 'header_desc_4',
            'content' => 'ông Lê Hoài Nam, Phó giám đốc Sở GD&ĐT TP.HCM',
        ]);
        \App\Config::query()->create([
            'type' => 'html',
            'show' => true,
            'name' => 'iframe_video',
            'content' => '<iframe width="810" height="455" src="https://www.youtube.com/embed/svL9zkmHSNE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        \App\Config::query()->create([
            'type' => 'html',
            'show' => true,
            'name' => 'html_section_1',
            'content' => '<div class="site-section bg-image overlay" style="background-image: url(\'lp/images/hero_1.jpg\');">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 testimony text-white">
                    <h1 class="mb-4 text-white">Chương trình đạo tạo tổng quát</h1>
                    <h2>Luyện thi PET, KET, TOEIC</h2>

                    <p><strong>M&ocirc; h&igrave;nh chuẩn ch&acirc;u &acirc;u: từ STARTERS, MOVERS, FLYERS TOEIC VỚI 4 KỸ NĂNG TỪ 350 ĐẾN 750 - 800 TRONG V&Ograve;NG 3 ĐẾN 6 TH&Aacute;NG</strong></p>

                    <h2>Giảng vi&ecirc;n</h2>

                    <p>Giảng vi&ecirc;n nhiệt t&igrave;nh, lu&ocirc;n theo s&aacute;t học vi&ecirc;n trong từng buổi học, v&agrave; trong suốt kh&oacute;a học</p>

                    <p>Tất cả c&aacute;c giảng vi&ecirc;n đều được đ&agrave;o tạo b&agrave;i bản chuy&ecirc;n nghiệp</p>

                    <p>C&oacute; kỹ năng sư phạm</p>

                    <p>C&oacute; kinh nghiệm giảng dạy - C&oacute; bằng Toeic, IELTS, B2, TESOL</p>

                    <p>Được đ&agrave;o tạo từ khoa ngoại ngữ của c&aacute;c trường đại học: Đại học ngoại ngữ H&agrave; Nội, Đại học Thương Mại,...</p>

                    <h2>Phương ph&aacute;p</h2>

                    <p><strong>Phương ph&aacute;p luyện nghe</strong></p>

                    <p>Được chia th&agrave;nh 3 giai đoạn : Pre-listening, While-listening, Post-listening</p>

                    <p>Với 3 bước n&agrave;y sẽ hỗ trợ học vi&ecirc;n nghe hiểu s&acirc;u v&agrave; bắt được nghĩa của b&agrave;i 1 c&aacute;ch r&otilde; r&agrave;ng nhất, v&agrave; c&oacute; khả năng diễn đạt &yacute; tưởng của c&acirc;u chuyện theo c&aacute;ch hiểu của bản th&acirc;n</p>

                    <h2><strong>Phương ph&aacute;p dạy &ldquo;SPEAKING&rdquo;</strong></h2>

                    <p>Role-play: Học vi&ecirc;n v&agrave; gi&aacute;o vi&ecirc;n đ&oacute;ng vai nh&acirc;n vật trong một ngữ cảnh nhất định để luyện tập kĩ năng n&oacute;i. Học vi&ecirc;n được cung cấp từ mới, cấu tr&uacute;c c&acirc;u để hiểu tường tận b&agrave;i n&oacute;i, chỉnh sửa ngữ &acirc;m gi&uacute;p học vi&ecirc;n n&oacute;i đ&uacute;ng ngữ điệu.</p>

                    <p>Sử dụng tiếng anh tối đa để giao tiếp trong lớp học lợi &iacute;ch của việc sử dụng tiếng anh trong lớp: Gi&uacute;p học vi&ecirc;n luyện nghe v&agrave; n&oacute;i một c&aacute;ch tr&ocirc;i chảy, tự nhi&ecirc;n nhất c&oacute; thể</p>

                    <p>Đưa cho học sinh cảm gi&aacute;c tiếng anh l&agrave; một ng&ocirc;n ngữ để giao tiếp thực sự chứ kh&ocirc;ng phải l&agrave; một ng&ocirc;n ngữ tr&ecirc;n s&aacute;ch vở, hay l&agrave; học vẹt</p>

                </div>
            </div>
        </div>
    </div>',
        ]);
        \App\Config::query()->create([
            'type' => 'html',
            'show' => true,
            'name' => 'html_section_2',
            'content' => '<div class="site-section pb-0">

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
                <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

                    <div class="p-4 rounded bg-white why-choose-us-box">

                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                            <div class="mr-3">
                                <span class="custom-icon-inner">
                                    <span class="icon icon-graduation-cap"></span>
                                </span>
                            </div>
                            <div>
                                <h2 class="m-0">Hanie 01</h2>
                                <p>
                                    Nhận mặt chữ
                                </p>
                                <p>
                                    Nắm được kiến thức giao tiếp cơ bản (kĩ năng, hình thành phản xạ)
                                </p>
                                <p>
                                    Làm quen với bảng phiên âm cơ bản, làm quen và mở khẩu hình
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

                    <div class="p-4 rounded bg-white why-choose-us-box">

                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                            <div class="mr-3">
                                <span class="custom-icon-inner">
                                    <span class="icon icon-graduation-cap"></span>
                                </span>
                            </div>
                            <div>
                                <h2 class="m-0">Hanie 02</h2>
                                <p>
                                    Tiếp xúc với nhiều tình huống giao tiếp khác nhau, hình thành vốn vựng cơ bản qua hơn 20 chủ đề quen thuộc
                                </p>
                                <p>
                                    Vận dụng kĩ năng mở khẩu hình, làm quen với các cấu trúc trong giao tiếp tiếng anh
                                </p>
                                <p>
                                    Tăng khả năng nói nhờ 20 bài FREETALKS trong quá trình học.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

                    <div class="p-4 rounded bg-white why-choose-us-box">

                        <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                            <div class="mr-3">
                                <span class="custom-icon-inner">
                                    <span class="icon icon-graduation-cap"></span>
                                </span>
                            </div>
                            <div>
                                <h2 class="m-0">Hanie 03</h2>
                                <p>
                                    Nắm được nhiều cáu trúc khó hơn cùng lượng từ vụng phong phú và tăng kĩ năng vận dụng từ vựng (tương đương TOEIC 600)
                                </p>
                                <p>
                                    Nắm chắc nhiều kiến thức cơ bản về các vấn đề trong cuộc sống nhờ lượng lớn từ vụng chuyên ngành theo chủ đề
                                </p>
                                <p>
                                    Tăng khả năng vẫn dụng ngữ pháp
                                </p>
                                <p>
                                    Tăng khả năng thuyết trình tiếng anh, vận dụng từ vựng (Tương đương TOEIC 750 và IELTS speaking 6.5)
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>',
        ]);
        \App\Config::query()->create([
            'type' => 'html',
            'show' => true,
            'name' => 'html_section_3',
            'content' => '<div class="site-section courses-title" id="levels-section">
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

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="lp/images/person_1.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                            <h3><a href="#">LEVEL 1: STARTERS</a></h3>
                            <p>- 40 buổi học bao gồm 4 bài test.</p>
                            <p>- Các mẫu câu đơn giản, ôn tập lại với 6 thì cơ bản.</p>
                            <p>- Với hơn 85 cấu trúc câu.</p>
                            <p>- 15 bài phát âm.</p>
                            <p>- Hơn 200 từ vựng.</p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="lp/images/person_3.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                           
                            <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                            <h3><a href="#">LEVEL 2: MOVERS</a></h3>
                            <p>- Hơn 30 buổi học.</p>
                            <p>- Các tình huống giao tếp gần gũi trong đời sống, luyện là chỉnh âm theo phương pháp role – play.</p>
                            <p>- 150 cấu trúc câu.</p>
                            <p>- 300 từ vựng.</p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="lp/images/person_4.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                           
                            <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                            <h3><a href="#">LEVEL 3: ADVANCED</a></h3>
                            <p>- Các từ ngữ chuyên ngành.</p>
                            <p>- Các chủ đề liên quan đến khoa học và cuộc sống.</p>
                            <p>- Gần 10 chủ đề lớn, phát triển toàn diện 4 kỹ năng: LISTENING, SPEAKING, WRITING, READING nhờ 140 bài giảng</p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>


                </div>



            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                    <button class="customNextBtn btn btn-primary m-1">Next</button>
                </div>
            </div>
        </div>
    </div>',
        ]);

    }
}
