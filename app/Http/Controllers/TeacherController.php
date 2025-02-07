<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //่การดึงข้อมูลทั้งหมด
    public function index()
    {
        $teachers = Teacher::all();// ดึงข้อมูลจากตาราง teachers แล้วเก็บไว้ในตัวแปร $teachers
        return response()->json($teachers);//   ส่งข้อมูลกลับไปเป็น JSON
    }

    // การดึงข้อมูลจากตาราง teachers โดยใช้ id
    public function show($id)
    {
        // ดึงข้อมูลจากตาราง teachers โดยใช้ id แล้วเก็บไว้ในตัวแปร $teacher
        $teacher = Teacher::findOrFail($id);
        return response()->json($teacher);
    }

    // การบันทึกข้อมูลลงในตาราง teachers
    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลที่ส่งมา
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teachers',
        ]);

        // บันทึกข้อมูลลงในตาราง teachers
        $teacher = Teacher::create($request->all());// บันทึกข้อมูล
        return response()->json($teacher, 201);// ส่งข้อมูลกลับไปเป็น JSON
    }

    // การแก้ไขข้อมูล
    public function update(Request $request, $id)// สร้าง function update สำหรับแก้ไขข้อมูล
    {
        $teacher = Teacher::findOrFail($id);// ดึงข้อมูลจากตาราง teachers โดยใช้ id แล้วเก็บไว้ในตัวแปร $teacher
        $teacher->update($request->all());// แก้ไขข้อมูล
        return response()->json($teacher);// ส่งข้อมูลกลับไปเป็น JSON
    }

    // การลบข้อมูล
    public function destroy($id)// สร้าง function destroy สำหรับลบข้อมูล
    {
        Teacher::destroy($id);// ลบข้อมูล
        return response()->json(null, 204);// ส่งข้อมูลกลับไปเป็น JSON
    }
}
