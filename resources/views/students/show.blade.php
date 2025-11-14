<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>{{ $student->name }}</h1>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>
    <p><strong>Scholarships:</strong></p>
<ul>
    @foreach ($student->scholarships as $scholarship)
        <li>{{ $scholarship->name }} (₹{{ $scholarship->amount }})</li>
    @endforeach
</ul>

    <a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>
