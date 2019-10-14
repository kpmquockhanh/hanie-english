<?php

namespace App\Http\Controllers;

use App\Advisory;
use App\Category;
use App\ConfigTestLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvisoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advisories = Advisory::query();
        $advisories = $advisories->paginate(10);
        return view('admin.advisories.index', compact('advisories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advisories.create');
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
                'name' => 'required|max:191',
                'phone' => 'required|numeric',
                'email' => 'required|email|max:191',
            ]
        );

        $createData = $request->only([
            'name',
            'phone',
            'email',
        ]);

        Advisory::query()->create($createData);
        return redirect(route('advisories.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * @param Advisory $advisory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Advisory $advisory)
    {
        return view('admin.advisories.edit', compact('advisory'));
    }

    /**
     * @param Request $request
     * @param Advisory $advisory
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Advisory $advisory)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:191',
                'phone' => 'required|numeric',
                'email' => 'required|email|max:191',
            ]
        );

        $updateData = $request->only([
            'name',
            'phone',
            'email',
        ]);

        $advisory->update($updateData);

        return redirect(route('advisories.index'))->with('success', 'Updated successfully!');
    }

    /**
     * @param Advisory $advisory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Advisory $advisory)
    {
        try {
            $advisory->delete();
            return redirect(route('advisories.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('advisories.index'))->with('error', 'Deleted error!');
        }
    }
}

