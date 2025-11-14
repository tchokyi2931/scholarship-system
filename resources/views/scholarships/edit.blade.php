<!DOCTYPE html>
<html>
<head>
    <title>Edit Scholarship</title>
</head>
<body>

<h1>Edit Scholarship</h1>

<form action="{{ route('scholarships.update', $scholarship->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ $scholarship->name }}" required><br><br>

    <label>Amount:</label>
    <input type="number" name="amount" value="{{ $scholarship->amount }}" required><br><br>

    <label>Description:</label>
    <input type="text" name="description" value="{{ $scholarship->description }}"><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
