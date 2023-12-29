<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Exports\BooksExport;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::orderBy('updated_at', 'DESC')->where('deleted_at', null)
            ->with(['user', 'category'])->get();

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
            'title' => 'required|string|max:255|unique:books,title',
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

        if (!Gate::allows('get-book', $book)) {
            return to_route('home')->with('warning', 'Anda Tidak Punya Ijin Melihat Data Ini');
        }

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
        if (!Gate::allows('update-book', $book)) {
            return to_route('home')->with('warning', 'Anda Tidak Punya Ijin Untuk Mengedit Data Ini');
        }
        $categories = BookCategory::whereNull('deleted_at')->get();

        return view('admin.pages.edit-book', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {

        $book = Book::find($book);
        if (!Gate::allows('update-book', $book)) {
            return to_route('home')->with('warning', 'Anda Tidak Punya Ijin Untuk Mengupdate Data Ini');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title,' . $book->id,
            'quantity' => 'required|integer',
            'category_id' => 'required',
            'cover' => 'mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'file' => 'mimes:pdf|max:10000',
            'description' => 'required'
        ]);

        if ($request->file('cover')) {

            if (file_exists(public_path('uploads/book-cover/' . $book->cover))) {
                unlink(public_path('uploads/book-cover/' . $book->cover));
            }
            $cover = time() . '.' . $request->cover->extension();

            $request->cover->move(public_path('uploads/book-cover'), $cover);

            $validated['cover'] = $cover;
        }

        if ($request->file('file')) {
            if (file_exists(public_path('uploads/book-file/' . $book->file))) {
                unlink(public_path('uploads/book-file/' . $book->file));
                /*
                    Delete Multiple files this way
                    Storage::delete(['upload/test.png', 'upload/test2.png']);
                */
            }
            $file = time() . '.' . $request->file->extension();

            $request->file->move(public_path('uploads/book-file'), $file);
            $validated['cover'] = $file;
        }

        $book->slug = '';
        $book->update($validated);
        return to_route('book.index')->with('success', trans('response.success.update', ['data' => 'Data Buku']));
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

        if (!Gate::allows('delete-book', $book)) {
            return to_route('home')->with('warning', 'Anda Tidak Punya Ijin Untuk Menghapus Data Ini');
        }

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

    public function exportExcel()
    {
        try {
            $date = date('Y_m_d_mhs', time());
            return Excel::download(new BooksExport(), 'export_data_buku_' . $date . '.xlsx');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
