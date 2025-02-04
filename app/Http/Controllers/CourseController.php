<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลทั้งหมดจากตาราง courses
        $courses = Course::all();
        
        // ส่งข้อมูลไปที่ view
        return view('courses.index', compact('courses'));
    }
}
