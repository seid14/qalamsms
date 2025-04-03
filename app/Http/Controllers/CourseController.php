<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of courses.
     */
    public function index()
    {
        $courseList = Course::with('enrolledStudents')->get();
        return view('courses.index', compact('courseList'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created course.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'courseTitle' => 'required',
            'courseDescription' => 'nullable'
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course added successfully');
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified course.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'courseTitle' => 'required',
            'courseDescription' => 'nullable'
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified course.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully');
    }
}
