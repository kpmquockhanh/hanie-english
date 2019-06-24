<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use App\UserCourse;
use App\UserLesson;
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
        $user_id = Auth::guard('user')->id();
        $course_id = $lesson->course_id;
        $userCourse = UserCourse::query()->where('course_id', $course_id)
            ->where('user_id', $user_id)
        ->first();
        if (!$userCourse) {
            abort(403);
        }
        $userLesson = UserLesson::getByUserAndLesson($user_id, $lesson->id)->first();
        if ($userLesson && $userLesson->count >= 3) {
            abort(403);
        }
        if (!$userLesson) {
            UserLesson::query()->insert([
                'user_id' => $user_id,
                'lesson_id' => $lesson->id,
            ]);
        }
        $lesson->load('video');
        return view('user.study', compact('lesson'));
    }

    public function incrementCount(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'lesson_id' => 'required|numeric',
        ]);
        $user_id = $request->user_id;
        $lesson_id = $request->lesson_id;

        UserLesson::getByUserAndLesson($user_id, $lesson_id)->increment('count');

        return response()->json([
            'status' => true
        ]);
    }
}
