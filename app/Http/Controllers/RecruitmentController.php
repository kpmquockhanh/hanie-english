<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $recruitments = Job::query()->paginate(10);
        return view('admin.recruitments.index', compact('recruitments'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Job $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $job = Job::query()->findOrFail($id);
        return view('admin.recruitments.edit', compact('job'));
    }

    /**
     * @param Request $request
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $job = Job::query()->findOrFail($id);
        $this->validate($request, [
            'email' => 'email'
        ]);

        $job->update($request->only([
            'name', 'message', 'email'
        ]));
        return redirect(route('recruitment.index'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::query()->findOrFail($id);
        try {
            $job->delete();
            return redirect(route('recruitment.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('recruitment.index'))->with('error', 'Deleted error!');
        }
    }
}
