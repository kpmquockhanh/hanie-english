<?php

namespace App\Http\Controllers;

use App\EducationProgram;
use Illuminate\Http\Request;

class EducationProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eps = EducationProgram::query()->paginate(10);
        return view('admin.education_programs.index', compact('eps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education_programs.create');
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
                'title' => 'required|max:100',
                'content' => 'required',
            ]
        );

        $createData = $request->only([
            'title',
            'content',
        ]);

        EducationProgram::query()->create($createData);
        return redirect(route('education-programs.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(EducationProgram $educationProgram)
    {
        //
    }

    /**
     * @param EducationProgram $educationProgram
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EducationProgram $educationProgram)
    {
        return view('admin.education_programs.edit', compact('educationProgram'));
    }

    /**
     * @param Request $request
     * @param EducationProgram $educationProgram
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, EducationProgram $educationProgram)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:191',
                'content' => 'required',
            ]
        );

        $updateData = $request->only([
            'title',
            'content'
        ]);

        $educationProgram->update($updateData);

        return redirect(route('education-programs.index'))->with('success', 'Updated successfully!');
    }

    /**
     * @param EducationProgram $educationProgram
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(EducationProgram $educationProgram)
    {
        try {
            $educationProgram->delete();
            return redirect(route('education-programs.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('education-programs.index'))->with('error', 'Deleted error!');
        }
    }
}

