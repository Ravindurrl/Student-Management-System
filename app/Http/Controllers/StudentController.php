<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
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

    // Show one student (optional for this assignment)
    public function show(string $id)
    {
        //
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
