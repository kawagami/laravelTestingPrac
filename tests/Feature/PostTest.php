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
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    // public function testInsertPostByGetRoute()
    // {
    //     $text = "Its a new post";

    //     $this->get("/posts/insert?post_text=$text");
    //     $response = $this->get('/posts/');

    //     $response->assertSee($text);
    // }

    public function testInsertPostByPostRoute()
    {
        $text = "Its a new post";

        $this->post(
            '/post',
            ['post_text' => $text]
        );

        $this->assertDatabaseHas('posts', ['post_text' => $text]);

        $response = $this->get('/posts');
        $response->assertSee($text);
    }
}
