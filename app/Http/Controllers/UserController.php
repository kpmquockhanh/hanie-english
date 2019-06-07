<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
                'name' => 'required',
                'username' => 'required|unique:users|alpha_dash',
                'avatar' => 'required|image',
                'password' => 'required|confirmed|min:8',
            ]
        );

        $createData = $request->only([
            'name',
            'username',
        ]);

        if ($request->status === 'on') {
            $createData['status'] = 1;
        }
        $createData['password'] = Hash::make($request->get('password'));

        if ($image = $request->file('avatar'))
        {
            $disk = 'uploads/users/';
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move($disk, $name);
            $createData['avatar'] = $disk.$name;
        }
        User::query()->create($createData);

        return redirect(route('users.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(
            $request,
            [
//                    'name' => 'required',
                'avatar' => 'image',
                'password' => 'confirmed|min:8|nullable',
            ]
        );

        $updateData = $request->only([
            'name',
        ]);
        if ($request->get('password')) {
            $updateData['password'] = Hash::make($request->get('password'));
        }

        if ($image = $request->file('avatar'))
        {
            $disk = 'uploads/users/';
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move($disk, $name);
            File::delete($user->avatar);
            $updateData['avatar'] = $disk.$name;
        }
        $user->update($updateData);

        return redirect(route('users.index'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect(route('users.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('users.index'))->with('error', 'Deleted error!');
        }
    }
}
