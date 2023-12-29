<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::check()) {
            $books = Book::whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->with(['category'])
                ->take(5)
                ->get();
            if (Auth::user()->role_id !== 2) {
                $books = $books->where('user_id', Auth::user()->id);
                $data['books_title_count'] = $books->count();

                $data['books_count'] = 0;
                foreach ($books as $book) {
                    $data['books_count'] += $book->quantity;
                }
            } else {

                $data['users_count'] = User::all()->count();
                $data['books_title_count'] = Book::all()->count();
                $data['book_categories_count'] = BookCategory::all()->count();

                $data['books_count'] = 0;
                foreach ($books as $book) {
                    $data['books_count'] += $book->quantity;
                }
            }
            return view('dashboard', compact('data', 'books'));
        }
        return view('welcome');
    }
}
