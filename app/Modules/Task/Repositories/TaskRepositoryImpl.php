<?php

namespace App\Modules\Task\Repositories;
use App\Modules\Task\Models\Task;

class TaskRepositoryImpl implements TaskRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return Task::all();
    }

    public function find($id): Task
    {
        return Task::findOrFail($id);
    }

    public function create($data): Task
    {
        return Task::create($data);
    }

    public function update($id, $data): Task
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete($id): void
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}

