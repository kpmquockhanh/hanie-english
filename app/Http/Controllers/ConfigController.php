<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::all();
        $homeImg1 = $configs->where('name', 'image_landing_home1')->first();
        $homeImg2 = $configs->where('name', 'image_landing_home2')->first();
        $bannerImgs = collect($configs->filter(function ($item) {
            return stristr($item->name, 'banner_image_');
        })->values());
        return view('admin.config', compact('configs', 'homeImg1', 'bannerImgs', 'homeImg2'));
    }

    public function update(Request $request)
    {
        $configs = $request->only([
            'header_desc_1',
            'header_desc_2',
            'header_desc_3',
            'header_desc_4',
            'iframe_video',
            'html_section_1',
            'html_section_2',
            'html_section_3',
            'fb_link',
            'yt_link',
            'ig_link',
        ]);

        foreach($configs as $name => $content)
        {
            Config::query()->where('name', $name)->update(['content' => $content]);
        }

        $this->uploadBannerImages($request);
        $this->uploadLandingImg($request);

        return redirect(route('admin.config'));
    }

    private function uploadLandingImg (Request $request) {
        if ($image = $request->file('image_landing_home1')) {
            $name = time().'.'.$image->getClientOriginalExtension();
            // resizing an uploaded file
            $resizedImg = $this->resizeImg($image);
            Storage::disk('s3')->put('landing_page/'.$name, $resizedImg, 'public');

            $homeImg = Config::query()->where('name', 'image_landing_home1')->first();

            if (!$homeImg) {
                Config::query()->create([
                    'name' => 'image_landing_home1',
                    'content' => 'landing_page/'.$name,
                    'type' => 'image',
                    'show' => 1,
                ]);
            } else {
                Storage::disk('s3')->delete($homeImg->content);

                $homeImg->update([
                    'content' => 'landing_page/'.$name,
                ]);
            }
        }
        if ($image = $request->file('image_landing_home2')) {
            $name = time().'.'.$image->getClientOriginalExtension();
            // resizing an uploaded file
            $resizedImg = $this->resizeImg($image);
            Storage::disk('s3')->put('landing_page/'.$name, $resizedImg, 'public');

            $homeImg = Config::query()->where('name', 'image_landing_home2')->first();

            if (!$homeImg) {
                Config::query()->create([
                    'name' => 'image_landing_home2',
                    'content' => 'landing_page/'.$name,
                    'type' => 'image',
                    'show' => 1,
                ]);
            } else {
                Storage::disk('s3')->delete($homeImg->content);

                $homeImg->update([
                    'content' => 'landing_page/'.$name,
                ]);
            }
        }
    }

    private function uploadBannerImages(Request $request) {
        if ($images = $request->file('image_banner')) {
            foreach ($images as $index => $image) {
                $name = time().'.'.$image->getClientOriginalExtension();
                // resizing an uploaded file
                $resizedImg = $this->resizeImg($image);
                Storage::disk('s3')->put('landing_page/'.$name, $resizedImg, 'public');

                $bannerImg = Config::query()->where('name', "banner_image_$index")->first();

                if (!$bannerImg) {
                    Config::query()->create([
                        'name' => "banner_image_$index",
                        'content' => 'landing_page/'.$name,
                        'type' => 'image',
                        'show' => 1,
                    ]);
                } else {
                    Storage::disk('s3')->delete($bannerImg->content);

                    $bannerImg->update([
                        'content' => 'landing_page/'.$name,
                    ]);
                }
            }
        }
    }

    private function resizeImg($image) {
        $resizedImg = Image::make($image);
        if ($resizedImg->width() < $resizedImg->height()) {
            $resizedImg->crop($resizedImg->width(), $resizedImg->width());
        } else {
            $resizedImg->crop($resizedImg->height(), $resizedImg->height());
        }
        return $resizedImg->resize(500, 500)->encode();
    }
}
