<!DOCTYPE html>
<html>
<head>
    <title>Scholarships List</title>
</head>
<body>

<h1>Scholarships</h1>

<a href="{{ route('scholarships.create') }}">Add New Scholarship</a>
<br><br>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Students</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($scholarships as $scholarship)
        <tr>
            <td>{{ $scholarship->id }}</td>
            <td>{{ $scholarship->name }}</td>
            <td>₹{{ $scholarship->amount }}</td>
            <td>{{ $scholarship->description }}</td>

            <td>
                @foreach ($scholarship->students as $student)
                    {{ $student->name }} <br>
                @endforeach
            </td>

            <td>
                <a href="{{ route('scholarships.show', $scholarship->id) }}">View</a> |
                <a href="{{ route('scholarships.edit', $scholarship->id) }}">Edit</a> |
                <form action="{{ route('scholarships.destroy', $scholarship->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this scholarship?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
