<?php
namespace App\Services;

use App\Models\Task;

class ClassName
{
    protected $taskRepository;

    public function all() {
        return Task::all();
    }

}
?>