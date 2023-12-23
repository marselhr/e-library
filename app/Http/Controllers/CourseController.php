<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

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
    public function edit($id)
    {
        $course = Course::find($id);
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course)
    {
        try {
            DB::beginTransaction();

            $course = Course::findOrFail($course);
            $request->validate([
                'title' => [
                    'required',
                    Rule::unique('courses')->ignore($course->id),
                ],
                'duration' => 'required|integer|max:12|min:1'
            ], $request->all());

            $course->update([
                'title' => $request->title,
                'duration' => $request->duration
            ]);
            DB::commit();
            return redirect()->back()->with('success', trans('response.success.update', ['data' => 'Data Kursus']));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
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
