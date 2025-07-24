<?php

namespace App\Modules\Task\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Task\Services\TaskService;
use App\Modules\Task\Requests\StoreTaskRequest;
use App\Modules\Task\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    // Dependency injection TaskService
    public function __construct(protected TaskService $taskService) {}

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json($tasks);
    }

    public function show(int $id)
    {
        $task = $this->taskService->getTaskById($id);
        return response()->json($task);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->createTask($request->all());
        return response()->json($task);
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        $task = $this->taskService->updateTask($id, $request->all());
        return response()->json($task);
    }

    public function destroy(int $id)
    {
        $this->taskService->deleteTask($id);
        return response()->json(null, 204);
    }
}
