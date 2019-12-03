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
        $homeImg = $configs->where('name', 'image_landing_home')->first();
        return view('admin.config', compact('configs', 'homeImg'));
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
            'html_section_3'
        ]);

        foreach($configs as $name => $content)
        {
            Config::query()->where('name', $name)->update(['content' => $content]);
        }
        if ($image = $request->file('image_landing_home')) {
            $name = time().'.'.$image->getClientOriginalExtension();
            // resizing an uploaded file
            $resizedImg = Image::make($image);
            if ($resizedImg->width() < $resizedImg->height()) {
                $resizedImg->crop($resizedImg->width(), $resizedImg->width());
            } else {
                $resizedImg->crop($resizedImg->height(), $resizedImg->height());
            }
            $resizedImg->resize(500, 500)->encode();
            Storage::disk('s3')->put('landing_page/'.$name, $resizedImg, 'public');

            $homeImg = Config::query()->where('name', 'image_landing_home')->first();

            if (!$homeImg) {
                Config::query()->create([
                    'name' => 'image_landing_home',
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

        return redirect(route('admin.config'));
    }
}
