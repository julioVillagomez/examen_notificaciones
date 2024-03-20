<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendNotificationTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_valid_bad_request(): void
    {
        $response = $this->post('/notification',[]);

        $response->assertStatus(302)->assertSessionHasErrors(['message','category']);
    }

    public function test_valid_request(): void
    {
        $this->seed();
        $response = $this->post('/notification',['category' =>1,'message' => 'holis']);

        $response->assertStatus(302)->assertSessionHasNoErrors()->assertSessionHas('success','Mensaje enviado correctamente');
    }
}
