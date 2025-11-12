<!DOCTYPE html>
<html>
<head>
    <title>Add Scholarship</title>
</head>
<body>
    <h1>Add New Scholarship</h1>

    <form action="{{ route('scholarships.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Amount:</label>
        <input type="number" name="amount" required><br><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br><br>

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('scholarships.index') }}">← Back to List</a>
</body>
</html>
