<?php

namespace App\Http\Controllers;

use App\Config;
use App\Phone;
use App\Teacher;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $configs = Config::all();
        $teachers = Teacher::all();

        return view('landing-page.master', compact('configs', 'teachers'));
    }

    public function storePhone(Request $request)
    {

        $this->validate($request, [
           'name' => ['required', 'string'],
           'phone_number' => ['required', 'regex:/\d{10,11}$/'],
        ]);
        $data = $request->only([
            'name', 'phone_number'
        ]);

        Phone::query()->create($data);

        return redirect(route('landing_page'));
    }
}
