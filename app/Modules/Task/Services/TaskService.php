<?php

namespace App\Modules\Task\Services;

use App\Modules\Task\Repositories\TaskRepositoryInterface;
use App\Modules\Task\Models\Task;

class TaskService
{
    public function __construct(protected TaskRepositoryInterface $taskRepository) {}

    public function getAllTasks(): \Illuminate\Support\Collection
    {
        return $this->taskRepository->all();
    }

    public function getTaskById($id): Task
    {
        return $this->taskRepository->find($id);
    }

    public function createTask($data): Task
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask($id, $data): Task
    {
        return $this->taskRepository->update($id, $data);
    }

    public function deleteTask($id): void
    {
        $this->taskRepository->delete($id);
    }
}

