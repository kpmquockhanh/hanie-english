<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();

        return view('admin.phones.index', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phones.create');
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
            $image->move('uploads', $name);
            $data['image'] = '/uploads/'.$name;
        }

        Phone::query()->create($data);

        return redirect(route('phones.index'));
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
        $teacher = Phone::query()->findOrFail($id);

        return view('admin.phones.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
            'word' => ['required', 'string'],
            'position' => ['required', 'string'],
//            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:2000'],
        ]);
        $teacher = Phone::query()->findOrFail($id);

        $data = $request->only([
            'name', 'word', 'position'
        ]);

        if ($image = $request->file('image'))
        {
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads', $name);
            $data['image'] = '/uploads/'.$name;
            Phone::delete($teacher->image);

        }
        $teacher->update($data);

        return redirect(route('phones.edit', ['id' => $teacher->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::destroy($id);

        return redirect(route('phones.index'));
    }
}