<?php

namespace App\Modules\Employee\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Employee\Services\EmployeeService;
use App\Modules\Employee\Requests\StoreEmployeeRequest;
use App\Modules\Employee\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeService $employeeService) {}

    public function index()
    {
        $employees = $this->employeeService->getAllEmployees();
        return response()->json($employees);
    }

    public function show(int $id)
    {
        $employee = $this->employeeService->getEmployeeById($id);
        return response()->json($employee);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = $this->employeeService->createEmployee($request->validated());
        return response()->json($employee);
    }

    public function update(UpdateEmployeeRequest $request, int $id)
    {
        $employee = $this->employeeService->updateEmployee($id, $request->validated());
        return response()->json($employee);
    }

    public function destroy(int $id)
    {
        $this->employeeService->deleteEmployee($id);
        return response()->json(null, 204);
    }
}
