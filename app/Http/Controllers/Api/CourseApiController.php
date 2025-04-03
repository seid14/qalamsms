<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CourseApiController extends Controller
{
    /**
     * Get all courses with their enrolled students.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $courses = Course::with('enrolledStudents')->get();
        return response()->json($courses);
    }

    /**
     * Store a new course.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'courseTitle' => 'required',
            'courseDescription' => 'nullable'
        ]);

        $course = Course::create($validated);
        return response()->json($course, 201);
    }
}
