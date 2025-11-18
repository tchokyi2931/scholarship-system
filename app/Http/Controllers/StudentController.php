<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('scholarships')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $scholarships = Scholarship::all();
        return view('students.create', compact('scholarships'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'course' => 'required|string',
            'scholarship_id' => 'nullable|exists:scholarships,id',
        ]);

        // Create student
        $student = Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'course' => $validated['course'],
        ]);

        // Attach scholarship through pivot table
        if ($request->scholarship_id) {
            $student->scholarships()->attach($request->scholarship_id);
        }

        return redirect()->route('students.index')
                         ->with('success', 'Student added successfully');
    }

    public function edit($id)
    {
        $student = Student::with('scholarships')->findOrFail($id);
        $scholarships = Scholarship::all();
        return view('students.edit', compact('student', 'scholarships'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'course' => 'required|string',
            'scholarship_id' => 'nullable|exists:scholarships,id',
        ]);

        $student = Student::findOrFail($id);

        // update student main info
        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'course' => $validated['course'],
        ]);

        // Sync scholarship (replace old with new)
        if ($request->scholarship_id) {
            $student->scholarships()->sync([$request->scholarship_id]);
        } else {
            $student->scholarships()->detach();  
        }

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->scholarships()->detach(); // clean pivot
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully');
    }
}
