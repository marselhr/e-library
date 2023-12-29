<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Book;
use App\Models\User;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookRequest;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('updated_at', 'DESC')->with(['user', 'category'])->get();

        // role id for admin = 2
        if (Auth::user()->role_id !== 2) {
            $books = $books->where('user_id', Auth::user()->id);
        }

        return view('admin.pages.book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BookCategory::whereNull('deleted_at')->get();
        return view('admin.pages.add-book', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'cover' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'file' => 'required|mimes:pdf|max:10000',
            'description' => 'required'
        ]);

        if ($request->file('cover')) {
            $cover = time() . '.' . $request->cover->extension();

            $request->cover->move(public_path('uploads/book-cover'), $cover);
        }

        if ($request->file('file')) {
            $file = time() . '.' . $request->file->extension();

            $request->file->move(public_path('uploads/book-file'), $file);
        }

        if ($validate) {
            DB::beginTransaction();

            Book::create([
                'user_id' => Auth::user()->id, //nanti dibenerin
                'category_id' => $request->category_id,
                'title' => $request->title,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'cover' => $cover,
                'file' => $file,
            ]);
            DB::commit();
            return to_route('book.index')->with('success', trans('response.success.store', ['data' => 'Data Buku']));
        }
        DB::rollBack();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->with(['category', 'user'])->firstOrFail();

        return view('admin.pages.show-book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        $book = Book::where('slug', $slug)->with(['user', 'category'])->firstOrFail();
        $categories = BookCategory::whereNull('deleted_at')->get();

        return view('admin.pages.edit-book', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        $book = Book::find($book);

        if (file_exists(public_path('uploads/book-cover/' . $book->cover))) {
            unlink(public_path('uploads/book-cover/' . $book->cover));
            /*
                Delete Multiple files this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }
        if (file_exists(public_path('uploads/book-file/' . $book->file))) {
            unlink(public_path('uploads/book-file/' . $book->file));
            /*
                Delete Multiple files this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }

        $book->delete();

        return redirect()->back()->with('success', trans('response.success.delete', ['data' => 'Data Buku']));
    }
}
