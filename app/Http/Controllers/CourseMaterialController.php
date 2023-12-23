<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($course)
    {

        $course = Course::find($course);
        $materials = $course->courseMaterial;
        return view('course-materials.index', compact('materials', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course)
    {
        $course = Course::find($course);
        return view('course-materials.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $course)
    {
        DB::beginTransaction();
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required',
            'embed_link' => 'required'
        ], $request->all());

        CourseMaterial::create([
            'course_id' => $course,
            'title' => $request->title,
            'description' => $request->description,
            'embed_link' => $request->embed_link
        ]);
        DB::commit();
        return to_route('course_materials.index', $course)->with('success', trans('response.success.store', ['data' => 'Data Materi']));
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseMaterial $courseMaterial)
    {
        //
    }
}
