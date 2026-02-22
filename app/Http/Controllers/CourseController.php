<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('lessons')->with(['lessons' => function ($query) {
            $query->orderBy('order_index');
        }])->get();
        
        $userProgress = auth()->check() 
            ? auth()->user()->progress()->pluck('lesson_id')->toArray()
            : session('completed_lessons', []);

        return Inertia::render('Dashboard', [
            'courses' => $courses,
            'userProgress' => $userProgress
        ]);
    }

    public function show(Course $course)
    {
        $course->load(['lessons' => function ($query) {
            $query->orderBy('order_index');
        }]);
        
        $userProgress = auth()->check() 
            ? auth()->user()->progress()->pluck('lesson_id')->toArray()
            : session('completed_lessons', []);

        return Inertia::render('Course/Show', [
            'course' => $course,
            'userProgress' => $userProgress
        ]);
    }
}
