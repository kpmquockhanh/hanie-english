<?php

namespace App\Http\Controllers;

use App\Advisory;
use App\Config;
use App\ConfigTestLinks;
use App\Course;
use App\EducationProgram;
use App\Feedback;
use App\Job;
use App\Level;
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
        $viewData = [
            'levels' => Level::all(),
            'configs' => Config::all()->keyBy('name'),
            'teachers' => Teacher::all(),
            'feedbacks' => Feedback::all(),
            'education_programs' => EducationProgram::all(),
        ];
        return view('landing-page.index')->with($viewData);
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
    public function makeAdvisory(Request $request)
    {
        // Check ajax
        if (!$request->json()) {
            return null;
        }

        try {
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required|numeric',
                'email' => 'email|required',
                'course_id' => 'numeric'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => 422,
                'errors' => $e->getMessage()
            ]);
        }
        Advisory::query()->create(
            $request->only([
                'name',
                'phone',
                'email'
            ])
        );
        $level = Level::with('testLink')->findOrFail($request->levelId);
        return response()->json([
            'status' => true,
            'code' => 200,
            'link' => $level->testLink
        ]);

    }
}
