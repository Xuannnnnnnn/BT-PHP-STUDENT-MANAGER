<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:100',
            'email' => 'required|email|unique:students',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công!');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fullname' => 'required|max:100',
            'email' => 'required|email|unique:students,email,'.$student->id,
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xóa sinh viên thành công!');
    }
}
