<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployee_EmployeeAPIRequest;
use App\Http\Requests\API\UpdateEmployee_EmployeeAPIRequest;
use App\Models\Employee_Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Employee_EmployeeController
 * @package App\Http\Controllers\API
 */

class Employee_EmployeeAPIController extends AppBaseController
{
    /**
     * Display a listing of the Employee_Employee.
     * GET|HEAD /employeeEmployees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Employee_Employee::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $employeeEmployees = $query->get();

        return $this->sendResponse($employeeEmployees->toArray(), 'Employee  Employees retrieved successfully');
    }

    /**
     * Store a newly created Employee_Employee in storage.
     * POST /employeeEmployees
     *
     * @param CreateEmployee_EmployeeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployee_EmployeeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Employee_Employee $employeeEmployee */
        $employeeEmployee = Employee_Employee::create($input);

        return $this->sendResponse($employeeEmployee->toArray(), 'Employee  Employee saved successfully');
    }

    /**
     * Display the specified Employee_Employee.
     * GET|HEAD /employeeEmployees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Employee_Employee $employeeEmployee */
        $employeeEmployee = Employee_Employee::find($id);

        if (empty($employeeEmployee)) {
            return $this->sendError('Employee  Employee not found');
        }

        return $this->sendResponse($employeeEmployee->toArray(), 'Employee  Employee retrieved successfully');
    }

    /**
     * Update the specified Employee_Employee in storage.
     * PUT/PATCH /employeeEmployees/{id}
     *
     * @param int $id
     * @param UpdateEmployee_EmployeeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployee_EmployeeAPIRequest $request)
    {
        /** @var Employee_Employee $employeeEmployee */
        $employeeEmployee = Employee_Employee::find($id);

        if (empty($employeeEmployee)) {
            return $this->sendError('Employee  Employee not found');
        }

        $employeeEmployee->fill($request->all());
        $employeeEmployee->save();

        return $this->sendResponse($employeeEmployee->toArray(), 'Employee_Employee updated successfully');
    }

    /**
     * Remove the specified Employee_Employee from storage.
     * DELETE /employeeEmployees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Employee_Employee $employeeEmployee */
        $employeeEmployee = Employee_Employee::find($id);

        if (empty($employeeEmployee)) {
            return $this->sendError('Employee  Employee not found');
        }

        $employeeEmployee->delete();

        return $this->sendSuccess('Employee  Employee deleted successfully');
    }
}
