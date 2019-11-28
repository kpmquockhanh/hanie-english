<?php

namespace App\Http\Controllers;

use App\ConfigTestLinks;
use Illuminate\Http\Request;

class TestLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testLinks = ConfigTestLinks::query();


        if ($request->ajax()) {
            $query = $request->q;
            $testLinks->select([
                'id',
                'label as text'
            ]);
            if (!$query) {
                return response()->json(['results' => $testLinks->get()]);
            }

            $testLinks->where('content', 'like', "%$query%");
            return response()->json(['results' => $testLinks->get()]);
        }
        $viewData = [
            'testLinks' => $testLinks->get()
        ];
        return view('admin.test-links.index')->with($viewData);
    }

    public function create() {
        return view('admin.test-links.create');
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
            'label' => 'required',
            'link' => 'required|url'
        ]);

        $data = $request->only([
            'label',
            'link'
        ]);

        ConfigTestLinks::query()->create($data);

        return redirect(route('test-link.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testLink = ConfigTestLinks::query()->findOrFail($id);
        $viewData = [
            'testLink' => $testLink
        ];
        return view('admin.test-links.edit')->with($viewData);
    }

    public function edit($id)
    {
        $testLink = ConfigTestLinks::query()->findOrFail($id);
        $viewData = [
            'testLink' => $testLink
        ];
        return view('admin.test-links.edit')->with($viewData);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'label' => 'required',
            'link' => 'required|url'
        ]);

        $data = $request->only([
            'label',
            'link'
        ]);

        $testLink = ConfigTestLinks::query()->findOrFail($id);
        $testLink->update($data);
        return redirect(route('test-link.index'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ConfigTestLinks::destroy($id);
            return redirect(route('test-link.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('test-link.index'))->with('error', 'Deleted error!');
        }
    }
}
