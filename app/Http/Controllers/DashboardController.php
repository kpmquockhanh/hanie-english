<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use App\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = UserCourse::with('course')
            ->where('user_id', Auth::guard('user')->id())
            ->get()
            ->map(function ($item) {
                return $item->course;
            });
        return view('user.index', compact('courses'));
    }

    public function listLessons(Course $course)
    {
        $course->load('lessons');

        return view('user.lessons', compact('course'));
    }

    public function study(Lesson $lesson)
    {
        $lesson->load('video');
//        dd($lesson);
        return view('user.study', compact('lesson'));
    }
}
