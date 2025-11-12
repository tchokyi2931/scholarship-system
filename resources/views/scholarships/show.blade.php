<!DOCTYPE html>
<html>
<head>
    <title>Scholarship Details</title>
</head>
<body>
    <h1>{{ $scholarship->name }}</h1>

    <p><strong>Amount:</strong> {{ $scholarship->amount }}</p>
    <p><strong>Description:</strong> {{ $scholarship->description }}</p>

    <a href="{{ route('scholarships.edit', $scholarship->id) }}">Edit</a>
    <form action="{{ route('scholarships.destroy', $scholarship->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Delete this scholarship?')">Delete</button>
    </form>

    <br><br>
    <a href="{{ route('scholarships.index') }}">← Back to All Scholarships</a>
</body>
</html>
