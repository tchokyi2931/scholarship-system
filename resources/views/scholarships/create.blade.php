<!DOCTYPE html>
<html>
<head>
    <title>Add Scholarship</title>
</head>
<body>

<h1>Add Scholarship</h1>

<form action="{{ route('scholarships.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Amount:</label>
    <input type="number" name="amount" required><br><br>

    <label>Description:</label>
    <input type="text" name="description"><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>
