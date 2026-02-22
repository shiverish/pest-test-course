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

        // INTERMEDIATE SECTION
        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 16: Datasets',
            'content' => 'Pest allows parameterised tests through Datasets. Write a test that receives an email from a dataset and verifies it contains the "@" symbol.',
            'starter_test_code' => "test('emails contain @', function (string \$email) {\n    // Assert \$email contains @\n})->with(['taylor@laravel.com', 'nuno@pestphp.com']);",
            'expected_assertion' => "expect(\$email)->toContain('@');",
            'hint' => "Use expect(\$email)->toContain('@'); inside the closure.",
            'order_index' => 16,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 17: Shared Datasets',
            'content' => 'Instead of defining inline arrays, you can define shared datasets across your test suite. Assume a dataset named "valid_emails" exists. Use the `with()` method to link it.',
            'starter_test_code' => "test('dataset works', function (\$email) {\n    expect(\$email)->toContain('@');\n})->// Call with() with the dataset name;",
            'expected_assertion' => "->with('valid_emails');",
            'hint' => "Chain ->with('valid_emails'); right after your test block.",
            'order_index' => 17,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 18: Scoped Datasets',
            'content' => 'You can pass associative arrays to datasets to test keys and values simultaneously. Given a dataset of usernames and ages, test that the age equals the expected value.',
            'starter_test_code' => "test('user ages', function (\$username, \$age) {\n    // Expect \$age to equal the expected value based on your testing logic\n})->with([\n    ['taylor', 35],\n    ['nuno', 30]\n]);",
            'expected_assertion' => 'expect($age)->toBeInt();',
            'hint' => 'Just for this exercise, verify the $age is an integer using expect($age)->toBeInt();',
            'order_index' => 18,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 19: Mocking with Mockery',
            'content' => 'Mocking dependencies is crucial in isolated unit tests. Use Laravel\'s built-in mocking wrapper `$this->mock()` to mock a `PaymentGateway` and expect the `charge` method to return true.',
            'starter_test_code' => "test('it charges payment', function () {\n    \$mock = \$this->mock(PaymentGateway::class, function (MockInterface \$mock) {\n        // Set the expectation for the charge method here\n    });\n});",
            'expected_assertion' => '$mock->shouldReceive(\'charge\')->andReturn(true);',
            'hint' => 'Use $mock->shouldReceive(\'charge\')->andReturn(true); inside the mock closure.',
            'order_index' => 19,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 20: Partial Mocks',
            'content' => 'Sometimes you want to mock specific methods but allow others to execute normally. Use `$this->partialMock()` on the `UserRepository` to mock only the `delete` method.',
            'starter_test_code' => "test('partial mock example', function () {\n    \$mock = \$this->partialMock(UserRepository::class, function (MockInterface \$mock) {\n        // Mock the delete method to return true\n    });\n});",
            'expected_assertion' => '$mock->shouldReceive(\'delete\')->andReturn(true);',
            'hint' => 'Partial mocks use the same shouldReceive() syntax. Write $mock->shouldReceive(\'delete\')->andReturn(true);',
            'order_index' => 20,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 21: Spies',
            'content' => 'Spies allow you to verify a method was called after the code executes, without defining behavior upfront. Use `$this->spy()` on the `NewsletterInterface` and then assert `subscribe` was called.',
            'starter_test_code' => "test('it spies on subscriber', function () {\n    \$spy = \$this->spy(NewsletterInterface::class);\n    \$spy->subscribe('test@example.com');\n    // Verify the subscribe method was called\n});",
            'expected_assertion' => '$spy->shouldHaveReceived(\'subscribe\');',
            'hint' => 'You can assert a spy was called using $spy->shouldHaveReceived(\'subscribe\');',
            'order_index' => 21,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 22: Testing Time (travelTo)',
            'content' => 'Often, business logic depends on the current date. Laravel\'s `travelTo` allows you to freeze time. Travel to the year 2000.',
            'starter_test_code' => "test('time travel works', function () {\n    // Travel to the year 2000 using a specific datetime string\n    expect(now()->year)->toBe(2000);\n});",
            'expected_assertion' => '$this->travelTo(Carbon::parse(\'2000-01-01\'));',
            'hint' => 'Use $this->travelTo(Carbon::parse(\'2000-01-01\')); to move time to the year 2000.',
            'order_index' => 22,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 23: Testing Artisan Commands',
            'content' => 'When testing Artisan commands, you can verify console output. Test the `inspire` command and expect it to output successfully.',
            'starter_test_code' => "test('inspire command works', function () {\n    // use artisan() to call inspire and assert successful exit code\n});",
            'expected_assertion' => '$this->artisan(\'inspire\')->assertSuccessful();',
            'hint' => 'Chain ->assertSuccessful() on $this->artisan(\'inspire\');',
            'order_index' => 23,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 24: Custom Expectations',
            'content' => 'Pest allows extending the expectation API. Assume a custom expectation named `toBePhoneNumber()` is defined. Use it to validate `$phone`.',
            'starter_test_code' => "test('phone number is valid', function () {\n    \$phone = '+15551234567';\n    // Call the custom expectation\n});",
            'expected_assertion' => 'expect($phone)->toBePhoneNumber();',
            'hint' => 'Just like regular expectations, chain ->toBePhoneNumber(); directly on expect($phone).',
            'order_index' => 24,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 25: Testing Events',
            'content' => 'Laravel makes it easy to fake Events. Write an assertion to establish that the `UserRegistered` event was dispatched.',
            'starter_test_code' => "test('user registered event dispatched', function () {\n    Event::fake();\n    event(new UserRegistered());\n    // Verify the event was dispatched\n});",
            'expected_assertion' => 'Event::assertDispatched(UserRegistered::class);',
            'hint' => 'Use Event::assertDispatched(UserRegistered::class); to check if it launched.',
            'order_index' => 25,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 26: Testing Mailables',
            'content' => 'Just like events, mail can be faked. After faking the mailer, send a WelcomeEmail and assert it was sent.',
            'starter_test_code' => "test('welcome email was sent', function () {\n    Mail::fake();\n    Mail::to('test@example.com')->send(new WelcomeEmail());\n    // Verify the mailable was sent\n});",
            'expected_assertion' => 'Mail::assertSent(WelcomeEmail::class);',
            'hint' => 'Use Mail::assertSent(WelcomeEmail::class); to ensure the mail was indeed queued/sent.',
            'order_index' => 26,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 27: RefreshDatabase Trait',
            'content' => 'When your tests touch the database, you need to use Laravel\'s RefreshDatabase. Pest accomplishes this through the `uses()` function. Call it with the RefreshDatabase trait.',
            'starter_test_code' => "// Set up the file to use the RefreshDatabase trait\nuses(RefreshDatabase::class);\n\ntest('database is empty', function () {\n    expect(User::count())->toBe(0);\n});",
            'expected_assertion' => 'uses(RefreshDatabase::class);',
            'hint' => 'Ensure the uses(RefreshDatabase::class); calls happen at the top of the test file.',
            'order_index' => 27,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 28: Model Factories',
            'content' => 'Factories are indispensable for generating dummy data. Create 3 User models using the User factory.',
            'starter_test_code' => "test('creates users', function () {\n    // Create 3 users and assign them to \$users\n    expect(\$users)->toHaveCount(3);\n});",
            'expected_assertion' => '$users = User::factory()->count(3)->create();',
            'hint' => 'Assign the result of User::factory()->count(3)->create(); to the $users variable.',
            'order_index' => 28,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 29: API Testing (JSON Paths)',
            'content' => 'When testing JSON APIs, it is helpful to assert data at specific paths within the JSON structure. Assert the "data.name" path equals "Taylor".',
            'starter_test_code' => "test('api returns correct name', function () {\n    \$response = \$this->getJson('/api/user/1');\n    // Call assertJsonPath to verify data.name is Taylor\n});",
            'expected_assertion' => '$response->assertJsonPath(\'data.name\', \'Taylor\');',
            'hint' => 'Use $response->assertJsonPath(\'data.name\', \'Taylor\'); to pinpoint the nested field.',
            'order_index' => 29,
        ]);

        \App\Models\Lesson::create([
            'course_id' => $course->id,
            'section' => 'intermediate',
            'title' => 'Lesson 30: API Testing (Status Codes)',
            'content' => 'Ensure your API endpoints return correct HTTP statuses. Check that a successful creation endpoint returns a 201 Created status.',
            'starter_test_code' => "test('api creates resource', function () {\n    \$response = \$this->postJson('/api/resource', ['name' => 'New']);\n    // Assert the status code denotes a successful creation (201)\n});",
            'expected_assertion' => '$response->assertCreated();',
            'hint' => 'You can chain ->assertCreated() against the $response object.',
            'order_index' => 30,
        ]);
    }
}
