<!DOCTYPE html>
<html>
<head><title>Students</title></head>
<body>
<h1>Students</h1>
<a href="{{ route('students.create') }}">Add Student</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1">
    <tr>
        <th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Actions</th>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->course }}</td>
        <td>
            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>
