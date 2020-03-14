<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feedbacks = Feedback::query()->paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feedback.create');
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
                'content' => 'required',
            ]
        );

        $createData = $request->only([
            'name',
            'content',
        ]);

        Feedback::query()->create($createData);
        return redirect(route('feedback.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * @param Feedback $feedback
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * @param Request $request
     * @param Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Feedback $feedback)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:191',
                'content' => 'required',
            ]
        );

        $updateData = $request->only([
            'name',
            'content'
        ]);

        $feedback->update($updateData);

        return redirect(route('feedback.index'))->with('success', 'Updated successfully!');
    }

    /**
     * @param Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Feedback $feedback)
    {
        try {
            $feedback->delete();
            return redirect(route('feedback.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('feedback.index'))->with('error', 'Deleted error!');
        }
    }
}
