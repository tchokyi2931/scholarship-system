@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h2>Add Scholarship</h2>

    <form action="{{ route('scholarships.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount:</label>
            <input type="number" name="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('scholarships.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

