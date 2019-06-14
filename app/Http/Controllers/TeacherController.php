<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
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
            'word' => ['required', 'string'],
            'position' => ['required', 'string'],
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:2000'],
        ]);

        $data = $request->only([
            'name', 'word', 'position'
        ]);

        if ($image = $request->file('image'))
        {
            $name = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('s3')->put('avatars/'.$name, file_get_contents($image), 'public');
//            $image->move('uploads', $name);
            $data['image'] = '/avatars/'.$name;
        }

        Teacher::query()->create($data);

        return redirect(route('teachers.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::query()->findOrFail($id);

        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
            'word' => ['required', 'string'],
            'position' => ['required', 'string'],
            'image' => ['mimes:jpeg,jpg,png', 'max:2000'],
        ]);
        $data = $request->only([
            'name', 'word', 'position'
        ]);

        if ($image = $request->file('image'))
        {
            $name = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('s3')->put('avatars/'.$name, file_get_contents($image), 'public');
//            $image->move('uploads', $name);
            $data['image'] = '/uploads/'.$name;

            Storage::disk('s3')->delete($teacher->image);
//            File::delete($teacher->image);

        }
        $teacher->update($data);

        return redirect(route('teachers.index'))->with('success', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();
            Storage::disk('s3')->delete($teacher->image);
            return redirect(route('teachers.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $exception) {
            return redirect(route('teachers.index'))->with('error', 'Deleted error!');
        }

    }
}
