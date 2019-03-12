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
            'content' => '<section id="courses" class="text-left">
    <h3 class="header-title text-center">CHƯƠNG TRÌNH ĐÀO TẠO TỔNG QUÁT</h3>

    <h5 class="text-left row font-30">Luyện thi PET, KET, TOEIC</h5>
    <dl class="row text-left">
        <dt><strong class="font-20">Mô hình chuẩn châu âu: từ STARTERS, MOVERS, FLYERS
TOEIC VỚI 4 KỸ NĂNG
TỪ 350 ĐẾN 750 - 800 TRONG VÒNG 3 ĐẾN 6 THÁNG</strong></dt>

    </dl>

    <h5 class="text-left row font-30">Giảng viên</h5>
    <dl class="row text-left">
        <dd>Giảng viên nhiệt tình, luôn theo sát học viên trong từng buổi học, và trong suốt khóa học</dd>
        <dd>Tất cả các giảng viên đều được đào tạo bài bản chuyên nghiệp</dd>
        <dd>Có kỹ năng sư phạm</dd>
        <dd>Có kinh nghiệm giảng dạy - Có bằng Toeic, IELTS, B2, TESOL</dd>
        <dd>Được đào tạo từ khoa ngoại ngữ của các trường đại học: Đại học ngoại ngữ Hà Nội, Đại học Thương Mại,...</dd>
    </dl>

    <h5 class="text-left row font-30">Phương pháp</h5>
    <dl class="row text-left">
        <dt><strong class="font-20">Phương pháp luyện nghe</strong></dt>
        <dd>Được chia thành 3 giai đoạn : Pre-listening, While-listening, Post-listening</dd>
        <dd>Với 3 bước này sẽ hỗ trợ học viên nghe hiểu sâu và bắt được nghĩa của bài 1 cách rõ ràng nhất, và có khả năng diễn đạt ý tưởng của câu chuyện theo cách hiểu của bản thân</dd>
        <dt><strong class="font-20">Phương pháp dạy “SPEAKING”</strong></dt>
        <dd>Role-play: Học viên và giáo viên đóng vai nhân vật trong một ngữ cảnh nhất định để luyện tập kĩ năng nói. Học viên được cung cấp từ mới, cấu trúc câu để hiểu tường tận bài nói, chỉnh sửa ngữ âm giúp học viên nói đúng ngữ điệu.</dd>
        <dd>Sử dụng tiếng anh tối đa để giao tiếp trong lớp học lợi ích của việc sử dụng tiếng anh trong lớp: Giúp học viên luyện nghe và nói một cách trôi chảy, tự nhiên nhất có thể</dd>
        <dd>Đưa cho học sinh cảm giác tiếng anh là một ngôn ngữ để giao tiếp thực sự chứ không phải là một ngôn ngữ trên sách vở, hay là học vẹt</dd>
    </dl>
</section>',
        ]);
        \App\Config::query()->create([
            'type' => 'html',
            'show' => true,
            'name' => 'html_section_2',
            'content' => '<section id="courses">
    <div class="row">
        <div class="tabset">
            <!-- Tab 1 -->
            <input type="radio" name="tabset" id="tab1" aria-controls="h1" checked="">
            <label for="tab1">Hanie 01</label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" aria-controls="h2">
            <label for="tab2">Hanie 02</label>
            <input type="radio" name="tabset" id="tab3" aria-controls="h3">
            <label for="tab3">Hanie 03</label>

            <div class="tab-panels">
                <section id="h1" class="tab-panel text-left">
                    <h2>Hanie 01</h2>
                    <p>Nhận mặt chữ</p>
                    <p>Nắm được kiến thức giao tiếp cơ bản (kĩ năng, hình thành phản xạ)</p>
                    <p>Làm quen với bảng phiên âm cơ bản, làm quen và mở khẩu hình</p>
                </section>
                <section id="h2" class="tab-panel text-left">
                    <h2>Hanie 02</h2>
                    <p>Tiếp xúc với nhiều tình huống giao tiếp khác nhau, hình thành vốn vựng cơ bản qua hơn 20 chủ đề quen thuộc</p>
                    <p>Vận dụng kĩ năng mở khẩu hình, làm quen với các cấu trúc trong giao tiếp tiếng anh</p>
                    <p>Tăng khả năng nói nhờ 20 bài FREETALKS trong quá trình học.</p>
                </section>
                <section id="h3" class="tab-panel text-left">
                    <h2>Hanie 03</h2>
                    <p>Nắm được nhiều cáu trúc khó hơn cùng lượng từ vụng phong phú và tăng kĩ năng vận dụng từ vựng (tương đương TOEIC 600)</p>
                    <p>Nắm chắc nhiều kiến thức cơ bản về các vấn đề trong cuộc sống nhờ lượng lớn từ vụng chuyên ngành theo chủ đề</p>
                    <p>Tăng khả năng vẫn dụng ngữ pháp</p>
                    <p>Tăng khả năng thuyết trình tiếng anh, vận dụng từ vựng (Tương đương TOEIC 750 và IELTS speaking 6.5)</p>
                </section>
            </div>
        </div>
    </div>

</section>',
        ]);
        \App\Config::query()->create([
            'type' => 'html',
            'show' => true,
            'name' => 'html_section_3',
            'content' => '<section id="level">
    <section id="sec">
    <h3 class="header-title">Các levels để giao tiếp thành thạo</h3>
    <ul>
        <li>
            <span class="fa fa-book"></span>

            <h3>Level 1: STARTERS</h3>
            <p>
                -	40 buổi học bao gồm 4 bài test.
            </p>
            <p>
                -	Các mẫu câu đơn giản, ôn tập lại với 6 thì cơ bản.
            </p>
            <p>
                -	Với hơn 85 cấu trúc câu.
            </p>
            <p>
                -	15 bài phát âm.
            </p>
            <p>
                -	Hơn 200 từ vựng.
            </p>
        </li>
        <li>
            <span class="fa fa-book"></span>
            <h3>Level 2: Movers</h3>
            <p>-	Hơn 30 buổi học.</p>
            <p>-	Các tình huống giao tếp gần gũi trong đời sống, luyện là chỉnh âm theo phương pháp role – play.</p>
            <p>-	150 cấu trúc câu.</p>
            <p>-	300 từ vựng.</p>
        </li>
        <li>
            <span class="fa fa-book"></span>
            <h3>Level 3: Advanced</h3>
            <p>-	Các từ ngữ chuyên ngành.</p>
            <p>-	Các chủ đề liên quan đến khoa học và cuộc sống.</p>
            <p>-    Gần 10 chủ đề lớn, phát triển toàn diện 4 kỹ năng: LISTENING, SPEAKING, WRITING, READING nhờ 140 bài giảng</p>
        </li>

    </ul>
</section></section>',
        ]);

    }
}
