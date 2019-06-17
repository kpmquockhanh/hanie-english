<?php

namespace App\Http\Controllers;

use App\Examination;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::all();

        return view('admin.examinations.index', compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.examinations.create');
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
            'lesson_id' => ['required'],
            'question_ids' => ['required']
        ]);
        Examination::query()->create([
            'lesson_id' => $request->lesson_id,
            'question_ids' => json_encode($request->question_ids),
            'created_by' => Auth::id()
        ]);

        return redirect(route('examinations.index'))->with('success', 'Created successfully!');
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
    public function edit(Examination $examination)
    {
        $questions = Question::query()->whereIn('id', json_decode($examination->question_ids))->get();
        return view('admin.examinations.edit', compact('examination', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examination $examination)
    {
        $this->validate($request, [
            'lesson_id' => ['required'],
            'question_ids' => ['required']
        ]);
        $examination->update([
            'lesson_id' => $request->lesson_id,
            'question_ids' => json_encode($request->question_ids),
            'created_by' => Auth::id()
        ]);

        return redirect(route('examinations.index'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
        try {
            Examination::destroy($examination->id);

            return redirect(route('examinations.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $exception) {
            return redirect(route('examinations.index'))->with('error', 'Deleted error!');
        }
    }
}
