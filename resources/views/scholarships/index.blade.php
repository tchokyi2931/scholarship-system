@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Scholarships List</h2>
    <a href="{{ route('scholarships.create') }}" class="btn btn-success">+ Add Scholarship</a>
</div>

<table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($scholarships as $scholarship)
            <tr>
                <td>{{ $scholarship->id }}</td>
                <td>{{ $scholarship->name }}</td>
                <td>₹{{ $scholarship->amount }}</td>

                <td>
                    <a href="{{ route('scholarships.show', $scholarship->id) }}" 
                       class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('scholarships.edit', $scholarship->id) }}" 
                       class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('scholarships.destroy', $scholarship->id) }}" 
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete scholarship?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
