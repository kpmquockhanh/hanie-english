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
        \App\Config::query()->insert([
            [
                'type' => 'text',
                'show' => true,
                'name' => 'header_desc_1',
                'content' => '“ Hanie English Đào tạo giao tiếp từ cơ bản đến nâng cao, kết hợp củng cố kiến thức nền vững chắc theo tiêu chuẩn quốc tế. Hiệu quả rõ rệt sau 20 ngày.”',
            ],
            [
                'type' => 'text',
                'show' => true,
                'name' => 'header_desc_2',
                'content' => '“ Luyện tập 4 kỹ năng, ôn thi các chứng chỉ PET, KET, TOEIC, ESOL,…”',
            ],
            [
                'type' => 'text',
                'show' => true,
                'name' => 'iframe_video',
                'content' => 'https://www.youtube.com/embed/svL9zkmHSNE',
            ],
            [
                'type' => 'text',
                'show' => true,
                'name' => 'fb_link',
                'content' => 'https://www.facebook.com/hanieenglish/',
            ],
            [
                'type' => 'text',
                'show' => true,
                'name' => 'yt_link',
                'content' => 'https://www.youtube.com/',
            ],
            [
                'type' => 'text',
                'show' => true,
                'name' => 'ig_link',
                'content' => 'https://www.instagram.com/',
            ],
        ]);
    }
}
