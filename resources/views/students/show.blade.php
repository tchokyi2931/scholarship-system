<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>{{ $student->name }}</h1>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>
    <a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>
