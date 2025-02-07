<?php
    namespace App\Http\Controllers;

    use App\Models\Student;
    use Illuminate\Http\Request;
    
    class StudentController extends Controller
    {
        public function index()// สร้าง function index สำหรับดึงข้อมูลจากตาราง students
        {
            // ดึงข้อมูลทั้งหมดจากตาราง students
        $students = Student::all();// ดึงข้อมูลจากตาราง students แล้วเก็บไว้ในตัวแปร $students

        // ส่งข้อมูลไปยัง View
        // โดยส่งข้อมูลที่ดึงมาจากฐานข้อมูลไปแสดงผลที่หน้า index.blade.php
        return view('students.index', compact('students'));
        }
    
        // สร้าง function create สำหรับแสดงหน้า form เพื่อเพิ่มข้อมูล
        public function show($id)
        {
            $student = Student::findOrFail($id);// ดึงข้อมูลจากตาราง students โดยใช้ id แล้วเก็บไว้ในตัวแปร $student
            return response()->json($student);// ส่งข้อมูลกลับไปเป็น JSON
        }
    
        // สร้าง function store สำหรับบันทึกข้อมูล
        public function store(Request $request)
        {
            // ตรวจสอบข้อมูลที่ส่งมา
            $request->validate([
                'student_id' => 'required|unique:students',// ต้องไม่ซ้ำกับข้อมูลในฐานข้อมูล
                'name' => 'required',// ต้องไม่เป็นค่าว่าง
                'email' => 'required|unique:students',// ต้องไม่ซ้ำกับข้อมูลในฐานข้อมูล
            ]);
    
            // บันทึกข้อมูลลงในตาราง students
            $student = Student::create($request->all());
            return response()->json($student, 201);// ส่งข้อมูลกลับไปเป็น JSON
        }
    
        // สร้าง function update สำหรับแก้ไขข้อมูล
        public function update(Request $request, $id)
        {
            // ตรวจสอบข้อมูลที่ส่งมา
            $student = Student::findOrFail($id);
            $student->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // ส่งข้อมูลกลับไปเป็น JSON
            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        }

    
        // สร้าง function destroy สำหรับลบข้อมูล
        public function destroy($id)
        {
            $student = Student::findOrFail($id);// ดึงข้อมูลจากตาราง students โดยใช้ id แล้วเก็บไว้ในตัวแปร $student
            $student->delete();     // ลบข้อมูล
        
            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');//โยนกลับไปหน้า index
        }
        

        // สร้าง function edit สำหรับแก้ไขข้อมูล
        public function edit($id)// สร้าง function edit สำหรับแก้ไขข้อมูล
        {
            $student = Student::findOrFail($id);// ดึงข้อมูลจากตาราง students โดยใช้ id แล้วเก็บไว้ในตัวแปร $student
            return view('students.edit', compact('student'));// ส่งข้อมูลไปยัง View
        }

    }
    