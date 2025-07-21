<?php

namespace App\Modules\Task\Services;

use App\Modules\Task\Repositories\TaskRepositoryImpl;
use App\Modules\Task\Models\Task;

class TaskService
{
    private TaskRepositoryImpl $taskRepository;

    public function __construct(TaskRepositoryImpl $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

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

