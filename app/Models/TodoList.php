<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $name
 * @property-read int $user_id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Collection todo_items
 * @property-read User user
 */
class TodoList extends Model
{
    use HasFactory;

    protected $with = [
        'todo_items'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'user_id' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'todo_items' => 'collection',
        'user' => 'object',
    ];

    public function todo_items(): BelongsTo
    {
        return $this->belongsTo(TodoItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(TodoItem::class);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
