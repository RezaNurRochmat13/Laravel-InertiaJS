<?php

namespace App\Modules\Employee\Http\Controllers;

use Inertia\Inertia;
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

        return Inertia::render('Employees/Index', [
            'employees' => $employees
        ]);
    }

    public function create()
    {
        return Inertia::render('Employees/Create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeService->createEmployee($request->validated());

        return Inertia::location(route('employees.index'));
    }

    public function show(int $id)
    {
        $employee = $this->employeeService->getEmployeeById($id);

        return Inertia::render('Employees/Show', [
            'employee' => $employee
        ]);
    }

    public function edit(int $id)
    {
        $employee = $this->employeeService->getEmployeeById($id);

        return Inertia::render('Employees/Edit', [
            'employee' => $employee
        ]);
    }

    public function update(UpdateEmployeeRequest $request, int $id)
    {
        $this->employeeService->updateEmployee($id, $request->validated());

        return Inertia::location(route('employees.index'));
    }

    public function destroy(int $id)
    {
        $this->employeeService->deleteEmployee($id);

        return Inertia::location(route('employees.index'));
    }
}
