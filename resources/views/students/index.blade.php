@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Students List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-success">+ Add Student</a>
</div>

<table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Scholarship</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->scholarship->name ?? 'None' }}</td>

                <td>
                    <a href="{{ route('students.edit', $student->id) }}" 
                       class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('students.destroy', $student->id) }}" 
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this student?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
