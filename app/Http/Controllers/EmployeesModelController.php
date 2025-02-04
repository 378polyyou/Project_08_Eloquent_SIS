<?php

namespace App\Http\Controllers;

use App\Models\EmployeesModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;// นำเข้า DB ที่นี่
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;


class EmployeesModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /* // ดึงข้อมูลแถวแรกจากตาราง employees
        $employees = DB::table('employees')->take(50)->get();

        // แปลงข้อมูลเป็น array
        $data = json_decode(json_encode($employees), true);

        // บันทึกข้อมูลลงใน log
        Log::info($data);

        // ส่งข้อมูลกลับในรูปแบบ JSON
        return response($data);*/
        $employees = DB::table('employees')->take(10)->get();
        return Inertia::render('EmployeesPage/index',['employees'=>$employees]);

    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments=DB::table('departments')->get();
        return Inertia::render('EmployeesPage/Create',
        [
            'departments'=>$departments
        ])
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeesModel $employeesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeesModel $employeesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeesModel $employeesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeesModel $employeesModel)
    {
        //
    }
}
