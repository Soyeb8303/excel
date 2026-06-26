<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::all();

        return view('students',compact('students'));
    }

    public function store(Request $request)
    {
        $validated=$request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:students',
            'contact'=>'required',
            'course'=>'required',

        ]);

        Student::create($validated);

        return redirect()->back()->with('success','Student Added Successfully');
    }

    public function export()
    {
        return Excel::download(new StudentsExport,'students.xlsx');
    }


public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv',
    ]);

    try {

        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->back()
            ->with('success', 'Excel Imported Successfully');

    } catch (\Exception $e) {

        return redirect()->back()
            ->with('error', 'Duplicate entry! This email already exists.');

    }
}

}