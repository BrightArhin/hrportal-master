<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployee_EmployeeRequest;
use App\Http\Requests\UpdateEmployee_EmployeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee_Employee;
use Illuminate\Http\Request;
use Flash;
use Response;

class Employee_EmployeeController extends AppBaseController
{
    /**
     * Display a listing of the Employee_Employee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Employee_Employee $employeeEmployees */
        $employeeEmployees = Employee_Employee::all();

        return view('admin.employee__employees.index')
            ->with('employeeEmployees', $employeeEmployees);
    }

    /**
     * Show the form for creating a new Employee_Employee.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.employee__employees.create');
    }

    /**
     * Store a newly created Employee_Employee in storage.
     *
     * @param CreateEmployee_EmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployee_EmployeeRequest $request)
    {
        $input = $request->all();

        /** @var Employee_Employee $employeeEmployee */
        $employeeEmployee = Employee_Employee::create($input);

        Flash::success('Employee  Employee saved successfully.');

        return redirect(route('admin.employeeEmployees.index'));
    }

    /**
     * Display the specified Employee_Employee.
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
            Flash::error('Employee  Employee not found');

            return redirect(route('admin.employeeEmployees.index'));
        }

        return view('admin.employee__employees.show')->with('employeeEmployee', $employeeEmployee);
    }

    /**
     * Show the form for editing the specified Employee_Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Employee_Employee $employeeEmployee */
        $employeeEmployee = Employee_Employee::find($id);

        if (empty($employeeEmployee)) {
            Flash::error('Employee  Employee not found');

            return redirect(route('admin.employeeEmployees.index'));
        }

        return view('admin.employee__employees.edit')->with('employeeEmployee', $employeeEmployee);
    }

    /**
     * Update the specified Employee_Employee in storage.
     *
     * @param int $id
     * @param UpdateEmployee_EmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployee_EmployeeRequest $request)
    {
        /** @var Employee_Employee $employeeEmployee */
        $employeeEmployee = Employee_Employee::find($id);

        if (empty($employeeEmployee)) {
            Flash::error('Employee  Employee not found');

            return redirect(route('admin.employeeEmployees.index'));
        }

        $employeeEmployee->fill($request->all());
        $employeeEmployee->save();

        Flash::success('Employee  Employee updated successfully.');

        return redirect(route('admin.employeeEmployees.index'));
    }

    /**
     * Remove the specified Employee_Employee from storage.
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
            Flash::error('Employee  Employee not found');

            return redirect(route('admin.employeeEmployees.index'));
        }

        $employeeEmployee->delete();

        Flash::success('Employee  Employee deleted successfully.');

        return redirect(route('admin.employeeEmployees.index'));
    }
}
