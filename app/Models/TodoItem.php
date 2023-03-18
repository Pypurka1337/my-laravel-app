<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read bool $finished
 * @property-read int $todo_list_id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property TodoList $todo_list
 * @property User $user
 */
class TodoItem extends Model
{
    use HasFactory;

    protected $touches = [
        'todo_list'
    ];

    protected $attributes = [
        'finished' => false,
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'todo_list_id' => 'integer',
        'finished' => 'boolean',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'todo_list' => 'object',
        'user' => 'object',
    ];

    public static function make(string $name): self
    {
        return (new self())->setName($name);
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function todo_list(): HasMany
    {
        return $this->hasMany(TodoList::class);
    }

    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, TodoItem::class);
    }

    public function finish(): self
    {
        $this->finished = true;
        return $this;
    }
}
