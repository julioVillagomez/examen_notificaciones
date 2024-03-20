<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessRouteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_route_form_notification(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_route_log_notification(): void
    {
        $response = $this->get('/log-notification');

        $response->assertStatus(200);
    }
}
