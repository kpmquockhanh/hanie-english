<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::query();
        if ($request->ajax()) {
            $query = $request->q;
            $categories->select([
                'id',
                'name as text'
            ]);
            if (!$query) {
                return response()->json(['results' => $categories->take(10)->get()]);
            }

            $categories->where('content', 'like', "%$query%");
            return response()->json(['results' => $categories->get()]);
        }
        $categories = $categories->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            ]
        );

        $createData = $request->only([
            'name',
        ]);
        $createData['created_by'] = Auth::id();

        Category::query()->create($createData);
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
            ]);
        }
        return redirect(route('categories.index'))->with('success', 'Created successfully!');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Category $category)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:191',
            ]
        );

        $updateData = $request->only([
            'name',
        ]);
        $updateData['created_by'] = Auth::id();

        Category::query()->update($updateData);

        return redirect(route('categories.index'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect(route('categories.index'))->with('success', 'Deleted successfully!');
        } catch (\Exception $e) {
            return redirect(route('categories.index'))->with('error', 'Deleted error!');
        }
    }
}
