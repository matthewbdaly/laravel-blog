<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Matthewbdaly\LaravelBlog\Eloquent\Models\User;

class AdminTest extends TestCase
{
    /**
     * Test home page
     *
     * @return void
     */
    public function testHomePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/admin/');
        $response->assertStatus(200);
    }

    /**
     * Test flat pages
     *
     * @return void
     */
    public function testFlatPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/admin/flatpages');
        $response->assertStatus(200);
    }
}
