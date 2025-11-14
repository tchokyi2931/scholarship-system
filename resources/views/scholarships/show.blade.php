<!DOCTYPE html>
<html>
<head>
    <title>Scholarship Details</title>
</head>
<body>

<h1>Scholarship Details</h1>

<p><strong>Name:</strong> {{ $scholarship->name }}</p>
<p><strong>Amount:</strong> ₹{{ $scholarship->amount }}</p>
<p><strong>Description:</strong> {{ $scholarship->description }}</p>

<h3>Students who got this scholarship:</h3>
<ul>
    @foreach ($scholarship->students as $student)
        <li>{{ $student->name }} ({{ $student->course }})</li>
    @endforeach
</ul>

<br>
<a href="{{ route('scholarships.index') }}">Back</a>

</body>
</html>
