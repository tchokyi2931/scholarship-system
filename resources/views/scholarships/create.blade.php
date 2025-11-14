<!DOCTYPE html>
<html>
<head>
    <title>Add Scholarship</title>
</head>
<body>

<h1>Add Scholarship</h1>

<form action="{{ route('scholarships.store') }}" method="POST">
    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Amount:</label><br>
    <input type="number" name="amount" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>
