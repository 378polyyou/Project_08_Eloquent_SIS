<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        
        $courses = Course::all();
        return response()->json($courses);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|unique:courses',
            'name' => 'required',
            'credits' => 'required|integer',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return response()->json($course);
    }

    public function destroy($id)
    {
        Course::destroy($id);
        return response()->json(null, 204);
    }
}
