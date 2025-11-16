<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('scholarship')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $scholarships = Scholarship::all();
        return view('students.create', compact('scholarships'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'course' => 'required|string',
            'scholarship_id' => 'nullable|exists:scholarships,id',
        ]);

        Student::create($data);

        return redirect()->route('students.index')
                         ->with('success', 'Student added successfully');
    }

    public function show($id)
    {
        $student = Student::with('scholarship')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $scholarships = Scholarship::all();
        return view('students.edit', compact('student', 'scholarships'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'course' => 'required|string',
            'scholarship_id' => 'nullable|exists:scholarships,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update($data);

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully');
    }
}
