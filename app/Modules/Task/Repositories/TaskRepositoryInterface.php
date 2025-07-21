<?php

namespace App\Modules\Task\Repositories;

use App\Modules\Task\Models\Task;

interface TaskRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function find($id): Task;
    public function create($data): Task;
    public function update($id, $data): Task;
    public function delete($id): void;
}

