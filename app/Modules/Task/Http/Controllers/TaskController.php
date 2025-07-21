<?php

namespace App\Modules\Task\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Modules\Task\Services\TaskService;
use App\Modules\Task\Requests\StoreTaskRequest;
use App\Modules\Task\Requests\UpdateTaskRequest;

class TaskController extends Controller
{

    // Dependency injection TaskService
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->taskService->createTask($request->validated());

        return Inertia::location(route('tasks.index'));
    }

    public function show(int $id)
    {
        $task = $this->taskService->getTaskById($id);

        return Inertia::render('Tasks/Show', [
            'task' => $task
        ]);
    }


    public function edit(int $id)
    {
        $task = $this->taskService->getTaskById($id);

        return Inertia::render('Tasks/Edit', [
            'task' => $task
        ]);
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        $this->taskService->updateTask($id, $request->validated());

        return Inertia::location(route('tasks.index'));
    }

    public function destroy(int $id)
    {
        $this->taskService->deleteTask($id);

        return Inertia::location(route('tasks.index'));
    }
}
