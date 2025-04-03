<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StudentApiController extends Controller
{
    /**
     * Get all students with their enrolled courses.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $students = Student::with('enrolledCourses')->get();
        return response()->json($students);
    }

    /**
     * Store a new student.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
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

        return response()->json($student->load('enrolledCourses'), 201);
    }
}
