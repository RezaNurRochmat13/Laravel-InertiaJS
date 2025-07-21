<?php

namespace App\Modules\Employee\Repositories;

use App\Modules\Employee\Models\Employee;

class EmployeeRepositoryImpl implements EmployeeRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return Employee::all();
    }

    public function find($id): Employee
    {
        return Employee::findOrFail($id);
    }

    public function create($data): Employee
    {
        return Employee::create($data);
    }

    public function update($id, $data): Employee
    {
        $employee = Employee::findOrFail($id);
        $employee->update($data);

        return $employee;
    }

    public function delete($id): void
    {
        Employee::findOrFail($id)->delete();
    }
}

