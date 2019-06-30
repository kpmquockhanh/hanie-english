<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Course;
use App\Lesson;
use App\Question;
use App\Score;
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
        $userCourse = UserCourse::query()
            ->where('course_id', $course_id)
            ->where('user_id', $user_id)
            ->first();
        if (!$userCourse) {
            abort(403);
        }

        $userLesson = UserLesson::getByUserAndLesson($user_id, $lesson->id)->first();
        if (!$userLesson) {
            UserLesson::query()->insert([
                'user_id' => $user_id,
                'lesson_id' => $lesson->id,
            ]);
        }
        if ($userLesson && $userLesson->count >= 3) {
            abort(403);
        }
        $lesson->load('video');
        return view('user.study', compact('lesson'));
    }

    public function examination(Lesson $lesson)
    {
        $questionIds = json_decode($lesson->examination->question_ids);
        $questions = Question::query()->whereIn('id', $questionIds)->get();
        $arrQuestion = [];
        foreach ($questions as $question)
        {
            $answerIds = json_decode($question->wrong_answer_ids);
            $answerIds[] = $question->right_answer_id;
            $answers = Answer::query()->whereIn('id', $answerIds)->get();
            $arrQuestion[] = [$question, $answers->shuffle()];
        }

        return view('user.examination', compact('lesson', 'arrQuestion'));
    }

    public function submitExamination(Request $request, Lesson $lesson)
    {
        $answerIds = $request->answer;
        $right_answers = Question::query()->pluck('right_answer_id', 'id');
        $result = [];
        foreach ($answerIds as $id) {
            $value = explode('_', $id);
            $result[$value[0]] = $value[1];
        }
        $count = 0;
        foreach ($right_answers as $id => $right_answer) {
            if ((int)$right_answer === (int)$result[$id]) {
                $count +=1;
            }
        }

        $score = (float)$count*10/count($right_answers);

        $data = [
            'user_id' => Auth::id(),
            'lesson_id' => $lesson->id,
            'score' => $score,
            'note' => null
        ];

        Score::query()->create($data);

        return redirect(route('dashboard.lessons', $lesson->course->id))->with('success', 'Finish examination '. $lesson->name.' !');
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
