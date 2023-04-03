<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserActivity>
 */
class UserActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'activity_id' => Activity::factory(),
            'point_in_time' => fake()->time(),
            'speed' => fake()->randomFloat(2, 3, 10)
        ];
    }
}
