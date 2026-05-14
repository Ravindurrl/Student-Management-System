<!DOCTYPE html>
<html>
<head><title>Edit Student</title></head>
<body>
<h1>Edit Student</h1>
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="first_name" value="{{ $student->first_name }}"><br>
    <input type="text" name="last_name" value="{{ $student->last_name }}"><br>
    <input type="email" name="email" value="{{ $student->email }}"><br>
    <input type="text" name="phone" value="{{ $student->phone }}"><br>
    <input type="text" name="course" value="{{ $student->course }}"><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
</body>
</html>
