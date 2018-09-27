<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Given I have two posts in the DB
        // and each one is posted one month apart
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // When I fetch the archives
        $posts = Post::archives();

        // Then the response should be in the correct format

        $this->assertCount(2, $posts);

        $this->assertEquals([
                [
                    'year' => $second->created_at->format('Y'),
                    'month' => $second->created_at->format('F'),
                    'published' => 1
                ],
                [
                    'year' => $first->created_at->format('Y'),
                    'month' => $first->created_at->format('F'),
                    'published' => 1
                ]
            ], $posts);

    }
}
