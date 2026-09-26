<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields.
     */
    protected $fillable = [
        'task_name',
        'description',
        'status',
        'due_date',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'due_date' => 'date',
    ];
}
