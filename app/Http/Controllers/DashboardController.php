<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $courses = Course::all()->count();
        $courseMaterials = CourseMaterial::all()->count();
        return view('dashboard', compact('courses', 'courseMaterials'));
    }
}
