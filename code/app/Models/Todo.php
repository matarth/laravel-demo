<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

	/**
	 * @var string
	 */
    protected $table = 'todo';

	/**
	 * @var array<int,string>
	 */
    protected $fillable = [
        'created_at',
        'done',
        'name',
        'comment',
        'user_id',
    ];

	/**
	 * @var string[]
	 */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'done' => 'boolean',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
