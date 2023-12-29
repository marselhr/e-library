<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;

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
        if (auth()->check()) {
            $courses = Course::all()->count();
            $courseMaterials = CourseMaterial::all()->count();
            return view('dashboard', compact('courses', 'courseMaterials'));
        }
        return view('welcome');
    }
}
