<h1>Scholarships List</h1>

<a href="{{ route('scholarships.create') }}">Add Scholarship</a>


<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Actions</th>
    </tr>

    @foreach ($scholarships as $scholarship)
        <tr>
            <td>{{ $scholarship->id }}</td>
            <td>{{ $scholarship->name }}</td>
            <td>₹{{ $scholarship->amount }}</td>
            <td>
                <a href="{{ route('scholarships.edit', $scholarship->id) }}">Edit</a>


                <form action="{{ route('scholarships.destroy', $scholarship->id) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
