<!DOCTYPE html>
<html>
<head><title>Add Student</title></head>
<body>
<h1>Add Student</h1>
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <input type="text" name="first_name" placeholder="First Name"><br>
    @error('first_name') <span>{{ $message }}</span> @enderror

    <input type="text" name="last_name" placeholder="Last Name"><br>
    @error('last_name') <span>{{ $message }}</span> @enderror

    <input type="email" name="email" placeholder="Email"><br>
    @error('email') <span>{{ $message }}</span> @enderror

    <input type="text" name="phone" placeholder="Phone"><br>
    <input type="text" name="course" placeholder="Course"><br>
    <button type="submit">Save</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
</body>
</html>
