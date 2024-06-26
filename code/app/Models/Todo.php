<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	use HasFactory;

	protected $table = 'todo';

	protected $fillable = [
		'created_at',
		'done',
		'name',
		'comment',
		'user_id',
	];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'done' => 'boolean',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
