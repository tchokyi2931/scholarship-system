@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h2>Student Details</h2>

    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>
    <p><strong>Scholarship:</strong> {{ $student->scholarship->name ?? 'None' }}</p>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
