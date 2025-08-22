<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title','description', 'priority', 'status', 'due_date'];

    public function casts()
    {
        return [
            'due_date' => 'datetime',
        ];
    }
}
