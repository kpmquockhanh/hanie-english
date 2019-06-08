<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $answers = Answer::query()->where('content', 'like', "%$q%");
        if ($request->ajax()) {
            if (!$q) {
                return response()->json(['results' => null]);
            }
            return response()->json(['results' => $answers->select([
                'id',
                'content as text'
            ])->get()]);
        }
        $answers = $answers->get();
        return view('admin.answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.answers.create');
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
                'content' => 'required'
            ]
        );

        $createData = $request->only(['content']);

        Answer::query()->create($createData);

        return redirect(route('answers.index'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        return view('admin.answers.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $this->validate(
            $request,
            [
                'content' => 'required'
            ]
        );

        $updateData = $request->only(['content']);

        if ($answer->content === $request->get('content')) {
            return redirect(route('answers.index'))->with('info', 'Updated successfully! No changes');
        }
        $answer->update($updateData);

        return redirect(route('answers.index'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        try {
            $answer->delete();
            return redirect(route('answers.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('answers.index'))->with('error', 'Deleted error!');
        }
    }

    public function list(Request $request)
    {
        return response()->json(123);
    }
}
