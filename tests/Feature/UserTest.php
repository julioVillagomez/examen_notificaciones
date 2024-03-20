<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_create_factory(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }


    public function test_relation_categories(): void
    {
        $category = Category::factory()->create();

        $user = User::factory()->categories()->create();

        $this->assertDatabaseHas('user_category',[
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);
    }

    public function test_relation_channels(): void
    {
        $channel = Channel::factory()->create();

        $user = User::factory()->channels()->create();

        $this->assertDatabaseHas('user_channel',[
            'user_id' => $user->id,
            'channel_id' => $channel->id
        ]);
    }
}
