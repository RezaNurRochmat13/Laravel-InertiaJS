<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return Inertia::render('Employees/Index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Employees/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $employee = Employee::create($request->all());
        return Inertia::location(route('employees.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return Inertia::render('Employees/Show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return Inertia::render('Employees/Edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $employee->update($request->all());
        return Inertia::location(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return Inertia::location(route('employees.index'));
    }
}
