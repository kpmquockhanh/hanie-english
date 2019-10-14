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
            'type' => 'text',
            'show' => true,
            'name' => 'iframe_video',
            'content' => 'https://www.youtube.com/embed/svL9zkmHSNE',
        ]);
    }
}
