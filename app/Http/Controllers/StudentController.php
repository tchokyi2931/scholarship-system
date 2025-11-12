<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('scholarships')->paginate(10);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|string|max:255',
            'scholarships' => 'array|exists:scholarships,id' // optional
        ]);

        $student = Student::create($data);
        if (!empty($data['scholarships'])) {
            $student->scholarships()->sync($data['scholarships']);
        }

        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function show(Student $student)
    {
        $student->load('scholarships');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $scholarships = Scholarship::all();
        $student->load('scholarships');
        return view('students.edit', compact('student', 'scholarships'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:students,email,{$student->id}",
            'course' => 'required|string|max:255',
            'scholarships' => 'array|exists:scholarships,id'
        ]);

        $student->update($data);
        $student->scholarships()->sync($data['scholarships'] ?? []);

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->scholarships()->detach();
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}
