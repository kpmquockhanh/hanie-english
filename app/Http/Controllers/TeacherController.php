<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        dd(12313);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
            'word' => ['required', 'string', 'max:191'],
            'position' => ['required', 'string', 'max:191'],
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:2000'],
        ]);

        $data = $request->only([
            'name', 'word', 'position'
        ]);
        $data['created_by'] = Auth::id();

        if ($image = $request->file('image')) {
            $name = time().'.'.$image->getClientOriginalExtension();

            // resizing an uploaded file
            $resizedImg = Image::make($image);
            if ($resizedImg->width() < $resizedImg->height()) {
                $resizedImg->crop($resizedImg->width(), $resizedImg->width());
            } else {
                $resizedImg->crop($resizedImg->height(), $resizedImg->height());
            }
            $resizedImg->resize(300, 300)->encode();
            Storage::disk('s3')->put('avatars/'.$name, $resizedImg, 'public');
            $data['image'] = 'avatars/'.$name;
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
            'word' => ['required', 'string', 'max:191'],
            'position' => ['required', 'string', 'max:191'],
            'image' => ['mimes:jpeg,jpg,png', 'max:2000'],
        ]);
        $data = $request->only([
            'name', 'word', 'position'
        ]);
        $data['created_by'] = Auth::id();

        if ($image = $request->file('image')) {
            $name = time().'.'.$image->getClientOriginalExtension();
            // resizing an uploaded file
            $resizedImg = Image::make($image);
            if ($resizedImg->width() < $resizedImg->height()) {
                $resizedImg->crop($resizedImg->width(), $resizedImg->width());
            } else {
                $resizedImg->crop($resizedImg->height(), $resizedImg->height());
            }
            $resizedImg->resize(300, 300)->encode();
            Storage::disk('s3')->put('avatars/'.$name, $resizedImg, 'public');
//            $image->move('uploads', $name);
            $data['image'] = 'avatars/'.$name;

            Storage::disk('s3')->delete($teacher->image);
//            File::delete($teacher->image);

        }
        $teacher->update($data);

        return redirect(route('teachers.index'))->with('success', 'Update successfully!');
    }

    /**
     * @param Teacher $teacher
     * @return \Illuminate\Http\RedirectResponse
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
