<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::all();
        return view('admin.config', compact('configs'));
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
        ]);

        foreach($configs as $name => $content)
        {
            Config::query()->where('name', $name)->update(['content' => $content]);
        }

        return redirect(route('admin.config'));
    }
}
