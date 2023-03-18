<?php

namespace Database\Factories;

use App\Models\TodoItem;
use App\Models\TodoList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TodoItem>
 */
class TodoItemFactory extends Factory
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
            'todo_list_id' => TodoList::inRandomOrder()->first()->id,
            'finished' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
