<?php

namespace App\Models\ToDoApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Task extends Model
{
    use HasFactory;

    /**
     * Get the user that owns this task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
