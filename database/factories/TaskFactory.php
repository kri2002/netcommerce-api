<?php

namespace Database\Factories;

use App\Enums\TaskStatus;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'is_completed' => fake()->boolean() ? TaskStatus::Completed : TaskStatus::Pending,
            'start_at' => fake()->dateTimeBetween('-1 week', 'now'),
            'expirate_at' => fake()->dateTimeBetween('now', '+1 month'),
            'company_id' => Company::factory(),
            'user_id' => User::factory(),
        ];
    }
}
