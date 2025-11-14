<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::paginate(10);
        return view('scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('scholarships.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        Scholarship::create($data);
        return redirect()->route('scholarships.index')->with('success', 'Scholarship created.');
    }

    public function show(Scholarship $scholarship)
    {
        $scholarship->load('students');
        return view('scholarships.show', compact('scholarship'));
    }

    public function edit(Scholarship $scholarship)
    {
    return view('scholarships.edit', compact('scholarship'));
}


    public function update(Request $request, Scholarship $scholarship)
    {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'description' => 'nullable|string',
    ]);

    $scholarship->update($data);

    return redirect()->route('scholarships.index')->with('success', 'Scholarship updated successfully!');
}


   public function destroy(Scholarship $scholarship)
   {
    $scholarship->delete();

    return redirect()->route('scholarships.index')->with('success', 'Scholarship deleted successfully!');
}

}
