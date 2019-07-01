<?php

namespace App\Http\Controllers;

use App\Course;
use App\Examination;
use App\Lesson;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lessons = Lesson::query();
        if ($request->ajax()) {
            $usedExam = Examination::query()->pluck('lesson_id')->toArray();
            $query = $request->q;
            $lessons->whereNotIn('id', $usedExam)->select([
                'id',
                'name as text'
            ]);
            if (!$query) {
                return response()->json(['results' => $lessons->take(10)->get()]);
            }

            $lessons->where('content', 'like', "%$query%");
            return response()->json(['results' => $lessons->get()]);
        }
        $lessons = $lessons->paginate();
        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'course_id' => 'required|numeric',
                'name' => 'required|max:191',
                'title' => 'required|max:191',
                'video' => 'required|mimes:mp4|size:102400',
            ]
        );
        $data = $request->only([
            'course_id', 'name', 'description'
        ]);
        $data['created_by'] = Auth::id();

        $dataVideo = $request->only([
            'title'
        ]);
        if ($video = $request->file('video')) {
            $dataVideo['disk'] = 'videos';
            $name = time().'.'.$video->getClientOriginalExtension();
            Storage::disk('s3')->put($dataVideo['disk'].'/'.$name, file_get_contents($video), 'public');
            $dataVideo['original_name'] = $video->getClientOriginalName();
            $dataVideo['path'] = $name;
        }

        DB::transaction(function () use ($data, $dataVideo) {
            Lesson::query()->create($data);
            $dataVideo['lesson_id'] = Lesson::max('id');
            Video::query()->create($dataVideo);
        });

        return redirect(route('lessons.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('admin.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Lesson $lesson, Request $request)
    {
        $this->validate(
            $request,
            [
                'course_id' => 'required|numeric',
                'name' => 'required|max:191',
                'title' => 'required|max:191',
                'video' => 'mimes:mp4|size:102400',
            ]
        );
        $data = $request->only([
            'course_id', 'name', 'description'
        ]);
        $data['created_by'] = Auth::id();

        $dataVideo = $request->only([
            'title'
        ]);
        if ($video = $request->file('video')) {
            $dataVideo['disk'] = 'videos';
            $name = time().'.'.$video->getClientOriginalExtension();
            Storage::disk('s3')->put($dataVideo['disk'].'/'.$name, file_get_contents($video), 'public');
            $dataVideo['original_name'] = $video->getClientOriginalName();
            $dataVideo['path'] = $name;

            Storage::disk('s3')->delete($lesson->video->disk.'/'.$lesson->video->path);
        }

        DB::transaction(function () use ($data, $dataVideo, $lesson) {
            $lesson->update($data);
            $lesson->video->update($dataVideo);
        });

        return redirect(route('lessons.index'))->with('success', 'UPdated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        try {
            DB::transaction(function () use ($lesson) {
                $lesson->delete();
                Storage::disk('s3')->delete($lesson->video->disk.'/'.$lesson->video->path);
                Video::destroy($lesson->video->id);
            });
            return redirect(route('lessons.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $exception) {
            return redirect(route('lessons.index'))->with('error', 'Deleted error!');
        }
    }
}
