<?php

namespace App\Modules\Employee\Services;

use App\Modules\Employee\Repositories\EmployeeRepositoryInterface;
use App\Modules\Employee\Models\Employee;

class EmployeeService {
    public function __construct(protected EmployeeRepositoryInterface $employeeRepository) {}

    public function getAllEmployees(): \Illuminate\Support\Collection {
        return $this->employeeRepository->all();
    }

    public function getEmployeeById($id): Employee {
        return $this->employeeRepository->find($id);
    }

    public function createEmployee($data): Employee {
        return $this->employeeRepository->create($data);
    }

    public function updateEmployee($id, $data): Employee {
        return $this->employeeRepository->update($id, $data);
    }

    public function deleteEmployee($id): void {
        $this->employeeRepository->delete($id);
    }
}
