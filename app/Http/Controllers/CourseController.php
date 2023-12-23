<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::whereNull('deleted_at')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            DB::beginTransaction();
            Course::create($request->validated());
            DB::commit();
            return redirect()->back()->with('success', trans('response.success.store', ['data' => 'Data Kursus']));
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($course)
    {
        try {
            DB::beginTransaction();
            $course = Course::find($course);
            $course->delete();
            DB::commit();
            return redirect()->back()->with('success', trans('response.success.delete', ['data' => 'Data Kursus']));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', trans('response.error.delete', ['data' => 'Data Kursus']));
        }
    }
}
