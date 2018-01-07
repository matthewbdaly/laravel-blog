<?php

namespace Tests\Unit\Http\Middleware;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelBlog\Http\Middleware\AdminModelExists;
use Mockery as m;
use Illuminate\Http\Request;

class AdminModelExistsTest extends TestCase
{
    /**
     * Test admin model can be reached when registered
     *
     * @return void
     */
    public function testCanReachAdminModelWhenRegistered()
    {
        // Set config
        $this->app['config']->set('admin.models', [
            'foo' => 'App\Foo'
        ]);
        
        // Create request
        $request = Request::create('http://example.com/admin/foo/', 'GET');

        // Create mock response
        $response = m::mock('Illuminate\Http\Response');
        $response->shouldReceive('getStatusCode')->andReturn(200);

        // Instantiate middleware
        $middleware = new AdminModelExists;

        // Call middleware
        $resp = $middleware->handle($request, function () use ($response) {
            return $response;
        });
        $this->assertEquals(200, $resp->getStatusCode());
    }

    /**
     * Test admin model cannot be reached when notregistered
     *
     * @return void
     */
    public function testCannotReachAdminModelWhenNotRegistered()
    {
        // Create request
        $request = Request::create('http://example.com/admin/foo/', 'GET');

        // Create mock response
        $response = m::mock('Illuminate\Http\Response');

        // Instantiate middleware
        $middleware = new AdminModelExists;

        // Call middleware
        $resp = $middleware->handle($request, function () use ($response) {
            return $response;
        });
        $this->assertEquals(404, $resp->getStatusCode());
    }
}
