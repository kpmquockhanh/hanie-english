<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $levels = Level::query()->paginate(10);
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'image' => 'required|image',
                'lesson_number' => 'numeric',
                'desc' => 'required'
            ]
        );

        $createData = $request->only([
            'title',
            'lesson_number',
            'duration_by_week',
            'desc'
        ]);

        $createData['created_by'] = Auth::id();

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
            Storage::disk('s3')->put('level_images/'.$name, $resizedImg, 'public');
            $createData['image'] = 'level_images/'.$name;
        }
//        dd($createData);
        Level::query()->create($createData);
        return redirect(route('levels.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * @param Level $level
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * @param Request $request
     * @param Level $level
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Level $level)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'image' => 'image',
                'lesson_number' => 'numeric',
                'desc' => 'required'
            ]
        );

        $updateData = $request->only([
            'title',
            'lesson_number',
            'duration_by_week',
            'desc'
        ]);

        if ($image = $request->file('image')) {
            $name = time() . '.' . $image->getClientOriginalExtension();
            // resizing an uploaded file
            $resizedImg = Image::make($image);
            if ($resizedImg->width() < $resizedImg->height()) {
                $resizedImg->crop($resizedImg->width(), $resizedImg->width());
            } else {
                $resizedImg->crop($resizedImg->height(), $resizedImg->height());
            }
            $resizedImg->resize(300, 300)->encode();
            Storage::disk('s3')->put('avatars/' . $name, $resizedImg, 'public');
            $updateData['image'] = 'avatars/' . $name;
            Storage::disk('s3')->delete($level->image);
        }
        $level->update($updateData);
        return redirect(route('levels.index'))->with('success', 'Updated successfully!');
    }

    /**
     * @param Level $level
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Level $level)
    {
        try {
            $level->delete();
            return redirect(route('levels.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('levels.index'))->with('error', 'Deleted error!');
        }
    }
}
