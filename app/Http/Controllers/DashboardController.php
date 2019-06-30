<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Course;
use App\Examination;
use App\Lesson;
use App\Question;
use App\Score;
use App\UserCourse;
use App\UserLesson;
use Carbon\Carbon;
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
        if (!$lesson->examination) {
            return redirect()->back()->withErrors('Has no examination!');
        }
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

        $score = Score::query()
            ->where('user_id', Auth::guard('user')->id())
            ->where('lesson_id', $lesson->id)
            ->first();

        if (!$score) {
            Score::query()->create([
                'user_id' => Auth::guard('user')->id(),
                'lesson_id' => $lesson->id,
                'score' => 0,
                'started_at' => Carbon::now(),
            ]);
        } elseif (!$score->started_at) {
            $score->update([
                'started_at' => Carbon::now()
            ]);
        } elseif ($score->end_at < Carbon::now()) {
            return redirect(route('dashboard.lessons', $lesson->course_id))->withErrors('Time is up!');
        }


        return view('user.examination', compact('lesson', 'arrQuestion', 'score'));
    }

    public function submitExamination(Request $request, Lesson $lesson)
    {
        $score = Score::query()
            ->where('user_id', Auth::guard('user')->id())
            ->where('lesson_id', $lesson->id)
            ->first();

        if (!$score) {
            Score::query()->create([
                'user_id' => Auth::guard('user')->id(),
                'lesson_id' => $lesson->id,
                'score' => 0,
                'started_at' => Carbon::now(),
            ]);
        } elseif (!$score->started_at) {
            $score->update([
                'started_at' => Carbon::now()
            ]);
        } elseif ($score->end_at < Carbon::now()) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false
                ]);
            }
            return redirect(route('dashboard.lessons'))->withErrors('Time is up!');
        }

        if (!$lesson->examination) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false
                ]);
            }
            return redirect(route('dashboard.lessons', $lesson->course_id))->with('error', 'Submit examination failed'. $lesson->name.' !');
        }

        $questionIds = json_decode($lesson->examination->question_ids);
        $questions = Question::query()
            ->whereIn('id', $questionIds)
            ->get();
        $result = [];
        foreach ($questions as $question) {
            $answerId = $request->get('answer_for_'.$question->id);
            $flg = false;
            if ($question->right_answer_id == $answerId) {
                $flg = true;

            }
            $result[$question->id] = $flg;
        }

        $result = collect($result);
        $rightAnswers = $result->filter(function ($item) {
            return $item;
        });


        $score = (float)$rightAnswers->count()*100/$result->count();

        $data = [
            'score' => $score,
        ];
        if ($request->submit === 'finish') {
            $data['started_at'] = Carbon::now()->subMinutes(Score::TIME_UP);
        }

        Score::query()
            ->where('user_id', Auth::guard('user')->id())
            ->where('lesson_id', $lesson->id)
            ->update($data);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true
            ]);
        }
        return redirect(route('dashboard.lessons', $lesson->course_id))->with('success', 'Finish examination '. $lesson->name.' !');
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
