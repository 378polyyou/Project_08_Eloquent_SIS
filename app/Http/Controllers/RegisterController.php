<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //แสดงแบบฟอร์มการลงทะเบียน
    // Show the registration form
    public function create()
    {
        // Get all courses available for registration
        $courses = Course::all();//ดึงข้อมูลทั้งหมดจากตาราง course
        return view('register', compact('courses')); //ส่งข้อมูลไปยัง View
    }

    // บันทึกข้อมูลการลงทะเบียน
    public function store(Request $request)// สร้าง function store สำหรับบันทึกข้อมูล
{
    //้ตรวจสอบข้อมูลที่ส่งมา
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:students,email',
        'course_id' => 'required|exists:courses,id',
    ]);

    // การสร้าง Student ID โดยใช้รหัสนักเรียนแบบสุ่ม)
    $student_id = 'STU' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    // การตรวจสอบว่า Student ID ที่สร้างขึ้นมีอยู่ในฐานข้อมูลแล้วหรือไม่
    while (Student::where('student_id', $student_id)->exists()) {
        $student_id = 'STU' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    // การบันทึกข้อมูลลงในตาราง students
    \Log::info('Generated Student ID: ' . $student_id);// บันทึกข้อมูลลงในไฟล์ log

    // หาก Student ID ที่สร้างขึ้นยังไม่มีในฐานข้อมูล ให้บันทึกข้อมูลลงในตาราง students
    // และสร้างข้อมูลลงในตาราง registers
    $student = Student::create([
        'student_id' => $student_id,// บันทึกข้อมูล
        'name' => $request->name,// บันทึกข้อมูล
        'email' => $request->email,// บันทึกข้อมูล
    ]);

    // การบันทึกข้อมูลลงในตาราง registers
    Register::create([
        'student_id' => $student->id,// บันทึกข้อมูล
        'course_id' => $request->course_id,
    ]);

    // ส่งข้อมูลกลับไปเป็น JSON
    return redirect()->route('register.create')->with('success', 'You have been successfully registered for the course!');
}

}
