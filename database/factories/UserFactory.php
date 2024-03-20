<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function categories(int $number = 2): static
    {
        return $this->afterCreating(function (User $user) use ($number) {
              $categories = Category::inRandomOrder()->limit($number)->get()->pluck('id')->toArray();
              $user->categories()->sync($categories);
        });
    }

    public function channels(int $number = 2): static
    {
        return $this->afterCreating(function (User $user) use ($number) {
            $channels = Channel::inRandomOrder()->limit($number)->get()->pluck('id')->toArray();
            $user->channels()->sync($channels);
        });
    }
}
