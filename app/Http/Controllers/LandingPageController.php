<?php

namespace App\Http\Controllers;

use App\Config;
use App\Course;
use App\Job;
use App\Phone;
use App\Teacher;
use Aws\ElastiCache\ElastiCacheClient;
use Aws\ElasticTranscoder\ElasticTranscoderClient;
use Aws\Exception\AwsException;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $configs = Config::all()->keyBy('name');
        $teachers = Teacher::all();
        $courses = Course::query()->take(4)->get();
//        $configs->transform(function($item) {
//            return $item->
//        });
//        dd($configs);
        return view('landing-page.index', compact('configs', 'teachers', 'courses'));
    }

    public function storePhone(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'regex:/\d{10,11}$/'],
        ]);
        $data = $request->only([
            'name', 'phone_number'
        ]);

        Phone::query()->create($data);

        return redirect(route('landing_page'));
    }

    public function storeJob(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'message' => ['max:191'],
        ]);
        $data = $request->only([
            'name', 'email', 'message'
        ]);

        Job::query()->create($data);

        return redirect(route('landing_page'));
    }

    public function test()
    {


    }
}
