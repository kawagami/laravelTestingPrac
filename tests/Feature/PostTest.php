<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAppPost()
    {
        $post = factory(Post::class)->create();

        $response = $this->get('/posts/');
        $response->assertStatus(200);
        $response->assertSee('All Posts:');

        $response->assertSee("Hello, I");
    }

    public function testInsertPost()
    {
        $post = factory(Post::class)->create();

        $this->assertDatabaseHas('posts', [
            'post_text' => "Hello, I'm Louis."
        ]);
    }
}
