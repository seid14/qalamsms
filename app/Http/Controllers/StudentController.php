<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        $studentList = Student::with('enrolledCourses')->get();
        return view('students.index', compact('studentList'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $courseList = Course::all();
        return view('students.create', compact('courseList'));
    }

    /**
     * Store a newly created student.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'studentName' => 'required',
            'studentEmail' => 'required|email|unique:students,studentEmail',
            'selectedCourses' => 'array'
        ]);

        $student = Student::create([
            'studentName' => $validated['studentName'],
            'studentEmail' => $validated['studentEmail']
        ]);

        if (isset($validated['selectedCourses'])) {
            $student->enrolledCourses()->attach($validated['selectedCourses']);
        }

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        $courseList = Course::all();
        return view('students.edit', compact('student', 'courseList'));
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'studentName' => 'required',
            'studentEmail' => 'required|email|unique:students,studentEmail,' . $student->id,
            'selectedCourses' => 'array'
        ]);

        $student->update([
            'studentName' => $validated['studentName'],
            'studentEmail' => $validated['studentEmail']
        ]);

        $student->enrolledCourses()->sync($request->selectedCourses ?? []);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified student.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}
