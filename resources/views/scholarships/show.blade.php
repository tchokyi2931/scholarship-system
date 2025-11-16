@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h2>Scholarship Details</h2>

    <p><strong>Name:</strong> {{ $scholarship->name }}</p>
    <p><strong>Amount:</strong> ₹{{ $scholarship->amount }}</p>
    <p><strong>Description:</strong> {{ $scholarship->description ?: 'N/A' }}</p>

    <h4>Students Assigned:</h4>
    <ul class="list-group">
        @forelse ($scholarship->students as $student)
            <li class="list-group-item">
                {{ $student->name }} ({{ $student->email }})
            </li>
        @empty
            <li class="list-group-item text-muted">No students assigned.</li>
        @endforelse
    </ul>

    <a href="{{ route('scholarships.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection

