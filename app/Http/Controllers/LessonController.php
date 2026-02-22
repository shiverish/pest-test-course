<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\UserProgress;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $lesson->load('course');
        
        if (auth()->check()) {
            $completed = UserProgress::where('user_id', auth()->id())
                ->where('lesson_id', $lesson->id)
                ->where('completed', true)
                ->exists();
        } else {
            $completed = in_array($lesson->id, session('completed_lessons', []));
        }

        $nextLesson = Lesson::where('course_id', $lesson->course_id)
            ->where('order_index', '>', $lesson->order_index)
            ->orderBy('order_index', 'asc')
            ->first();

        return Inertia::render('Lesson/Show', [
            'lesson' => $lesson,
            'isCompleted' => $completed,
            'nextLesson' => $nextLesson
        ]);
    }

    public function submit(Request $request, Lesson $lesson)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $submittedCode = $request->input('code');
        $expected = $lesson->expected_assertion;

        // Extremely simplified validation for MVP: Check if their code contains the expected string snippet.
        // In a real sandbox, we would execute `pest` in a docker container.
        
        // Remove whitespaces to make it a bit more resilient
        $normalizedSubmitted = preg_replace('/\s+/', '', $submittedCode);
        $normalizedExpected = preg_replace('/\s+/', '', $expected);

        $passed = str_contains($normalizedSubmitted, $normalizedExpected);

        if ($passed) {
            if (auth()->check()) {
                UserProgress::updateOrCreate(
                    ['user_id' => auth()->id(), 'lesson_id' => $lesson->id],
                    ['completed' => true]
                );
            } else {
                $completedLessons = session('completed_lessons', []);
                if (!in_array($lesson->id, $completedLessons)) {
                    $completedLessons[] = $lesson->id;
                    session(['completed_lessons' => $completedLessons]);
                }
            }

            return back()->with('success', 'Test passed successfully! Great job.');
        }

        return back()->with('error', 'Test failed. Did you write the correct assertion? Expected something like: ' . $expected);
    }
}
