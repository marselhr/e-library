<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BookCategory::whereNull('deleted_at')->orderBy('updated_at', 'DESC')->get();

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
            'name' => 'required|string|min:3|max:255|unique:book_categories,name',
            'description' => 'required|string|min:3|max:550',
        ]);
        BookCategory::create($validated);
        return to_route('categories.index')->with('success', trans('response.success.store', ['data' => 'Kategory Buku']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BookCategory $bookCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($bookCategory)
    {
        $category = BookCategory::find($bookCategory);

        return view('admin.pages.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $bookCategory)
    {
        $category = BookCategory::findOrFail($bookCategory);
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('book_categories')->ignore($category->id),
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
            $bookCategory = BookCategory::find($bookCategory);
            $bookCategory->delete();
            return redirect()->back()->with('success', trans('response.success.delete', ['data' => 'Kategory Buku']));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
