<?php

namespace Tests\Feature;

use App\Models\LogNotification;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogNotificationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_log_notication(): void
    {
        $user = User::factory()->create();
        LogNotification::factory()->create();

        $this->assertDatabaseHas('log_notifications', [
            'user_id' => $user->id,
        ]);
    }
}
