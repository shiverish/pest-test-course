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

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 4: Asserting Empty Objects',
            'content' => 'Sometimes you need to ensure an array or collection contains no items. Use the `toBeEmpty()` method on your expectation to verify our `$users` array is empty.',
            'starter_test_code' => "test('array is empty', function () {\n    \$users = [];\n    // Verify \$users is empty\n});",
            'expected_assertion' => 'expect($users)->toBeEmpty();',
            'hint' => 'Pass the $users variable into expect() and chain ->toBeEmpty().',
            'order_index' => 4,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 5: Asserting Strings',
            'content' => 'If you are checking that an email address contains a specific domain, you can use the `toContain()` assertion. Write a test asserting that `$email` contains "laravel.com".',
            'starter_test_code' => "test('email contains domain', function () {\n    \$email = 'taylor@laravel.com';\n    // Verify \$email contains laravel.com\n});",
            'expected_assertion' => "expect(\$email)->toContain('laravel.com');",
            'hint' => "Use expect(\$email)->toContain('laravel.com');",
            'order_index' => 5,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 6: Type Checking',
            'content' => 'In object-oriented programming, verifying an object\'s class is critical. Use `toBeInstanceOf()` to check if `$user` is an instance of the `User::class`.',
            'starter_test_code' => "test('it is a user', function () {\n    \$user = new User();\n    // Verify \$user is a User instance\n});",
            'expected_assertion' => 'expect($user)->toBeInstanceOf(User::class);',
            'hint' => 'You can assert expect($user)->toBeInstanceOf(User::class);',
            'order_index' => 6,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 7: Higher Order Testing',
            'content' => 'Pest provides a powerful `each()` modifier to iterate over collections. Rather than writing a foreach loop, use `expect($items)->each->toBeInt()` to assert all items are integers.',
            'starter_test_code' => "test('all items are integers', function () {\n    \$items = [1, 2, 3, 4, 5];\n    // Assert each item is an int\n});",
            'expected_assertion' => 'expect($items)->each->toBeInt();',
            'hint' => 'Use expect($items)->each->toBeInt() to cleanly map assertions over the array.',
            'order_index' => 7,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 8: Checking Nullability',
            'content' => 'Asserting a value is completely null is a common task. Try writing an expectation using `toBeNull()` to verify `$result` is null.',
            'starter_test_code' => "test('result is null', function () {\n    \$result = null;\n    // Verify \$result is null\n});",
            'expected_assertion' => 'expect($result)->toBeNull();',
            'hint' => 'Just chain ->toBeNull() against your expectation.',
            'order_index' => 8,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 9: Chaining Expectations',
            'content' => 'Pest lets you chain modifiers fluently via the `and()` method to assert multiple different states in one clean sentence. Verify the array has 2 items `and()` also contains the word "Pest".',
            'starter_test_code' => "test('array has 2 items and contains Pest', function () {\n    \$tags = ['Laravel', 'Pest'];\n    // Chain toHaveCount(2)->and(\$tags)->toContain('Pest')\n});",
            'expected_assertion' => "expect(\$tags)->toHaveCount(2)->and(\$tags)->toContain('Pest');",
            'hint' => "Write exactly: expect(\$tags)->toHaveCount(2)->and(\$tags)->toContain('Pest');",
            'order_index' => 9,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 10: Array Keys Checking',
            'content' => 'Dealing with associative arrays? Use `toHaveKey()` to verify that an array contains a specific key. Check that our `$user` array has the key "name".',
            'starter_test_code' => "test('array has name key', function () {\n    \$user = ['name' => 'Nuno', 'role' => 'admin'];\n    // Verify it has the key 'name'\n});",
            'expected_assertion' => "expect(\$user)->toHaveKey('name');",
            'hint' => "expect(\$user)->toHaveKey('name');",
            'order_index' => 10,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 11: Matching Regular Expressions',
            'content' => 'Sometimes strings are highly dynamic, but follow a pattern. You can use regex to validate them using `toMatch()`. Validate our version string against the regex pattern `/^v\d\.\d\.\d$/`.',
            'starter_test_code' => "test('version matches regex', function () {\n    \$version = 'v1.0.0';\n    // Match the regex\n});",
            'expected_assertion' => "expect(\$version)->toMatch('/^v\d\.\d\.\d$/');",
            'hint' => "Use ->toMatch('/^v\d\.\d\.\d$/') on your expectation.",
            'order_index' => 11,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 12: Asserting Greater Than',
            'content' => 'Math comparators are built securely into Pest. Write an assertion using `toBeGreaterThan(10)` to ensure `$age` passes the test.',
            'starter_test_code' => "test('age is greater than 10', function () {\n    \$age = 15;\n    // Verify it is greater than 10\n});",
            'expected_assertion' => 'expect($age)->toBeGreaterThan(10);',
            'hint' => 'expect($age)->toBeGreaterThan(10);',
            'order_index' => 12,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 13: Floating Point Comparison',
            'content' => 'When dealing with floating-point math where precision might shift, `toEqualWithDelta()` gives you wiggle room. Check if `$weight` equals 100 with a delta of 0.5.',
            'starter_test_code' => "test('weight is roughly 100', function () {\n    \$weight = 100.2;\n    // Expect it to equal 100 with a 0.5 delta\n});",
            'expected_assertion' => 'expect($weight)->toEqualWithDelta(100, 0.5);',
            'hint' => 'You pass both the target and the delta: expect($weight)->toEqualWithDelta(100, 0.5);',
            'order_index' => 13,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 14: Asserting Json Structs',
            'content' => 'When validating HTTP JSON payloads, you don\'t always want to test every exact key. You can use `toMatchArray()` to verify that an array contains at least the provided subset of key/value pairs.',
            'starter_test_code' => "test('response drops a token fragment', function () {\n    \$payload = ['id' => 1, 'token' => 'abc', 'timestamp' => 12345];\n    // Match the array subset ['token' => 'abc']\n});",
            'expected_assertion' => "expect(\$payload)->toMatchArray(['token' => 'abc']);",
            'hint' => "expect(\$payload)->toMatchArray(['token' => 'abc']); helps match subsets.",
            'order_index' => 14,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'title' => 'Lesson 15: Boolean Falsey',
            'content' => 'Lastly, it is important to know if a response evaluates to false (like 0, null, \'\', etc.). Write a test using `toBeFalsy()` to verify the `$isActive` variable evaluates to false.',
            'starter_test_code' => "test('it is falsey', function () {\n    \$isActive = 0;\n    // Verify it is falsy\n});",
            'expected_assertion' => 'expect($isActive)->toBeFalsy();',
            'hint' => 'expect($isActive)->toBeFalsy(); works perfectly.',
            'order_index' => 15,
        ]);
    }
}
