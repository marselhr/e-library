<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;
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
            $courses = Course::all()->count();
            $courseMaterials = CourseMaterial::all()->count();

            $books = Book::whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->with(['category'])
                ->take(5)
                ->get();
            if (Auth::user()->role_id !== 2) {
                $books = $books->where('user_id', Auth::user()->id);
            }

            return view('dashboard', compact('courses', 'courseMaterials', 'books'));
        }
        return view('welcome');
    }
}
