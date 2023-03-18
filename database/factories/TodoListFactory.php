<?php

namespace Database\Factories;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TodoList>
 */
class TodoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText(255),
            'user_id' => User::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
