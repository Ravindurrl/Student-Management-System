<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students by serchrching and pagination
     public function index(Request $request)
{
    $search = $request->input('search');

    $students = Student::when($search, function ($query, $search) {
        $query->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
    })->simplePaginate(10);

    return view('students.index', compact('students', 'search'));
}

    // Show the create form
    public function create()
    {
        return view('students.create');
    }

    // Save new student to database
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:students',
            'phone'      => 'required',
            'course'     => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Student added successfully!');
    }

   


    // Show the edit form
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update student in database
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:students,email,' . $id,
            'phone'      => 'required',
            'course'     => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    // Delete student from database
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }


}
