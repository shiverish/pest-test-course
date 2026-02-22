<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = \App\Models\Course::create([
            'title' => 'Learn Laravel Unit Testing with Pest',
            'description' => 'Master unit testing in Laravel using the elegant Pest PHP framework created by Nuno Maduro.',
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 1: Introduction to Pest PHP',
            'content' => 'Welcome to the Pest PHP course. Pest is an elegant testing framework created by Nuno Maduro. In this first lesson, write your first basic test that simply asserts true is true. We have provided the test case for you, you just need to write the assertion.',
            'starter_test_code' => "test('true is true', function () {\n    // Write your expectation here\n});",
            'expected_assertion' => 'expect(true)->toBeTrue();',
            'hint' => 'You can use the expect() function and chain the ->toBeTrue() method on it.',
            'order_index' => 1,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 2: Asserting Arrays',
            'content' => 'Often you will need to check if an array contains a specific key or value. Write a test to expect the given array to have a count of 3 items.',
            'starter_test_code' => "test('array has 3 items', function () {\n    \$array = [1, 2, 3];\n    // Write your expectation here\n});",
            'expected_assertion' => 'expect($array)->toHaveCount(3);',
            'hint' => 'Using expect($array), you can call ->toHaveCount(3) to verify the number of elements.',
            'order_index' => 2,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 3: Expecting Exceptions',
            'content' => 'Let us test if a specific exception is thrown. Use Pest\'s throws() expectation to ensure a RuntimeException is thrown when a dangerous function is called.',
            'starter_test_code' => "test('it throws an exception', function () {\n    throw new RuntimeException('Oops!');\n})// Write your throws declaration here;",
            'expected_assertion' => '->throws(RuntimeException::class);',
            'hint' => 'At the end of your test() closure, chain ->throws(RuntimeException::class) to expect that exception.',
            'order_index' => 3,
        ]);
    }
}
