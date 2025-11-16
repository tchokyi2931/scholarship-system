@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h2>Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Course:</label>
            <input type="text" name="course" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Scholarship:</label>
            <select name="scholarship_id" class="form-control">
                <option value="">-- Select Scholarship --</option>
                @foreach ($scholarships as $sch)
                    <option value="{{ $sch->id }}">{{ $sch->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

