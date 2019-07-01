<?php

namespace App\Http\Controllers;

use App\User;
use App\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($q = $request->q) {
            $users->where('id', $q);
            $users->orWhere('username', 'like', "%$q%");
        }
        $users = $users->paginate(5);
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
                'avatar' => 'required|mimes:jpeg,jpg,png|max:2000',
                'password' => 'required|confirmed|min:8',
            ]
        );

        $createData = $request->only([
            'name',
            'username',
        ]);
        $createData['created_by'] = Auth::id();

        if ($request->status === 'on') {
            $createData['status'] = 1;
        }
        $createData['password'] = Hash::make($request->get('password'));

        if ($image = $request->file('avatar')) {
            $disk = 'avatars/';
            $name = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('s3')->put($disk.$name, file_get_contents($image), 'public');
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
        $courses = UserCourse::with('course')
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($item) {
                return $item->course;
            });
        return view('admin.users.show', compact('user', 'courses'));
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
                'avatar' => 'required|mimes:jpeg,jpg,png|max:2000',
                'password' => 'confirmed|min:8|nullable',
            ]
        );

        $updateData = $request->only([
            'name'
        ]);
        $updateData['created_by'] = Auth::id();
        $updateData['status'] = 0;
        if ($request->status === 'on') {
            $updateData['status'] = 1;
        }
        if ($request->get('password')) {
            $updateData['password'] = Hash::make($request->get('password'));
        }

        if ($image = $request->file('avatar')) {
            $disk = 'avatars/';
            $name = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('s3')->put($disk.$name, file_get_contents($image), 'public');
            Storage::disk('s3')->delete($user->avatar);
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
            Storage::disk('s3')->delete($user->avatar);
            return redirect(route('users.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('users.index'))->with('error', 'Deleted error!');
        }
    }

    public function makeCourses(Request $request)
    {
        if (!$request->user_id || !count($request->courses)) {
            return null;
        }
        $currentCourses = UserCourse::query()
            ->where('user_id', $request->user_id)
            ->get(['course_id'])
            ->map(function ($item) {
                return $item->course_id;
            })->toArray();
        $deleteCourses = array_diff($currentCourses, $request->courses);
        $insertCourse = array_diff($request->courses, $currentCourses);

        UserCourse::query()->whereIn('course_id', $deleteCourses)
            ->where('user_id', $request->user_id)->delete();

        foreach ($insertCourse as $course_id) {
            UserCourse::query()->create([
                'user_id' => $request->user_id,
                'course_id' => $course_id
            ]);
        }

        return redirect(route('users.show', ['id' => $request->user_id]));
//        foreach ()
    }
}
