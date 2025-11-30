<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['list_id', 'name', 'description', 'status', 'priority', 'deadline'];
    protected $casts = ['deadline' => 'date'];

    public function list()
    {
        return $this->belongsTo(TodoList::class, 'list_id');
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }
}