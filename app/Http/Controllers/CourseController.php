<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::query();

        if ($request->ajax()) {
            $query = $request->get('query');
            $except = $request->get('except');
            $courses->select([
                'id',
                'name as text'
            ]);

            if ($except != null) {
                $courses->whereNotIn('id', $except);
            }
            if ($query) {
                $courses->where('name', 'like', "%$query%");
            }

            return response()->json(['results' => $courses->get()->map(function ($item) {
                return [
                  'id' => $item->id,
                  'text' => $item->text.' '."($item->id)",
                ];
            })]);
        }

        $courses = $courses->paginate(5);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
            'description' => 'required'
        ]);

        $data = $request->only([
            'name', 'description'
        ]);
        $data['created_by'] = Auth::id();

        Course::query()->create($data);

        return redirect(route('courses.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course->load('lessons');
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course = Course::query()->findOrFail($course->id);

        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
        ]);

        $data = $request->only([
            'name', 'description'
        ]);
        $data['created_by'] = Auth::id();

        $course->update($data);

        return redirect(route('courses.index'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        try {
            Course::destroy($course->id);
            return redirect(route('courses.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $exp) {
            return redirect(route('courses.index'))->with('error', 'Deleted error!');
        }
    }
}
