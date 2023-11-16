<?php

namespace Database\Factories;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
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
            'user_id' => User::query()
                ->select('id')
                ->pluck('id')
                ->shuffle()
                ->first(),
            'title' => fake()->name(),
            'description' => fake()->text(1000),
            'priority' => fake()->randomElement(TaskPriority::getValues()),
            //'status' => fake()->randomElement(TaskStatus::getValues()),
        ];
    }
}
