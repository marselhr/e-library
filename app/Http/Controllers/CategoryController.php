<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereNull('deleted_at')->orderBy('updated_at', 'DESC')->get();

        return view('admin.pages.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:categories,name',
            'description' => 'required|string|min:3|max:550',
        ]);
        Category::create($validated);
        return to_route('categories.index')->with('success', trans('response.success.store', ['data' => 'Kategory Buku']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $bookCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('admin.pages.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Category  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $bookCategory)
    {
        $category = Category::findOrFail($bookCategory);
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('categories')->ignore($category->id),
            ],
            'description' => 'required'
        ]);
        $category->slug = '';
        $category->update($validated);
        return to_route('categories.index')->with('success', trans('response.success.update', ['data' => 'Kategory Buku']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookCategory)
    {
        try {
            $bookCategory = Category::find($bookCategory);
            $bookCategory->delete();
            return redirect()->back()->with('success', trans('response.success.delete', ['data' => 'Kategory Buku']));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
