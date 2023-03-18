<?php

namespace Database\Seeders;

use App\Models\TodoItem;
use App\Models\TodoList;
use Illuminate\Database\Seeder;

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TodoList::factory(30)->afterCreating(function (TodoList $todo_list) {
            TodoItem::factory(3)->create(['todo_list_id' => $todo_list->id]);
        })->create();
    }
}
