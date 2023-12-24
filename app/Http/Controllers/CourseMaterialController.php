<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($course)
    {

        $course = Course::find($course);
        $materials = CourseMaterial::where('course_id', $course->id)->orderBy('order', 'ASC')->get();
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
    public function edit($course, $courseMaterial)
    {
        $course = Course::findOrFail($course);
        $courseMaterial = $course->courseMaterial()->where('id', $courseMaterial)->firstOrFail();
        return view('course-materials.edit', compact('course', 'courseMaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course, $courseMaterial)
    {
        DB::beginTransaction();
        $courseMaterial = CourseMaterial::findOrFail($courseMaterial);
        $request->validate([
            'title' =>   [
                'required',
                Rule::unique('course_materials')->ignore($courseMaterial->id),
            ],
            'order' => 'required|integer',
            'description' => 'required',
            'embed_link' => 'required'
        ], [
            'title.required' => 'Judul Materi Tidak Boleh Kosong',
            'title.unique' => 'Judul Materi Telah Digunakan',
            'description.required' => 'Deskripsi Materi Wajib Diisi',
            'embed_link.required' => 'Silahkan Sematkan Tautan Materi',
            'order.required' => 'Silahkan Masukkan Urutan Materi',
            'order.integer' => 'Urutan Harus Berupa Angka',
        ]);

        $courseMaterial->update([
            'order' => $request->order,
            'title' => $request->title,
            'description' => $request->description,
            'embed_link' => $request->embed_link,
        ]);
        DB::commit();
        return to_route('course_materials.index', $course)->with('success', trans('response.success.update', ['data' => 'Materi']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($course, $courseMaterial)
    {
        try {

            DB::beginTransaction();
            $courseMaterial = CourseMaterial::findOrFail($courseMaterial);
            $courseMaterial->delete();
            DB::commit();
            return redirect()->back()->with('success', trans('response.success.delete', ['data' => 'Materi']));
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
