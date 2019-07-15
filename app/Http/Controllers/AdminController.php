<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function update(Request $request)
    {

        $admin = Auth::guard('admin')->user();
        $this->validate(
            $request,
            [
                'name' => 'max:191',
                'avatar' => 'mimes:jpeg,jpg,png|max:2000',
                'password' => 'nullable|confirmed|min:8|max:191',
            ]
        );

        $updateData = $request->only([
            'name'
        ]);
        if ($request->get('password')) {
            $updateData['password'] = Hash::make($request->get('password'));
        }

        if ($image = $request->file('avatar')) {
            $disk = 'avatars/';
            $name = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('s3')->put($disk.$name, file_get_contents($image), 'public');
            Storage::disk('s3')->delete($admin->avatar);
            $updateData['avatar'] = $disk.$name;
        }
        $admin->update($updateData);

        return redirect(route('admin.index'))->with('success', 'Updated admin successfully!');
    }
}
