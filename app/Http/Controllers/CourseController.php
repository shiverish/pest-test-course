<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('lessons')->get();
        // Calculate user progress per course if needed, simple version for MVP
        return Inertia::render('Dashboard', [
            'courses' => $courses
        ]);
    }

    public function show(Course $course)
    {
        $course->load(['lessons' => function ($query) {
            $query->orderBy('order_index');
        }]);
        
        $userProgress = auth()->user()->progress()->pluck('lesson_id')->toArray();

        return Inertia::render('Course/Show', [
            'course' => $course,
            'userProgress' => $userProgress
        ]);
    }
}
