<?php

namespace App\Modules\Employee\Repositories;

use App\Modules\Employee\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection;
    public function find($id): Employee;
    public function create($data): Employee;
    public function update($id, $data): Employee;
    public function delete($id): void;
}
