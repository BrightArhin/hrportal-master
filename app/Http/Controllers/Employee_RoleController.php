<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployee_RoleRequest;
use App\Http\Requests\UpdateEmployee_RoleRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee_Role;
use Illuminate\Http\Request;
use Flash;
use Response;

class Employee_RoleController extends AppBaseController
{
    /**
     * Display a listing of the Employee_Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Employee_Role $employeeRoles */
        $employeeRoles = Employee_Role::all();

        return view('admin.employee__roles.index')
            ->with('employeeRoles', $employeeRoles);
    }

    /**
     * Show the form for creating a new Employee_Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.employee__roles.create');
    }

    /**
     * Store a newly created Employee_Role in storage.
     *
     * @param CreateEmployee_RoleRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployee_RoleRequest $request)
    {
        $input = $request->all();

        /** @var Employee_Role $employeeRole */
        $employeeRole = Employee_Role::create($input);

        Flash::success('Employee  Role saved successfully.');

        return redirect(route('admin.employeeRoles.index'));
    }

    /**
     * Display the specified Employee_Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Employee_Role $employeeRole */
        $employeeRole = Employee_Role::find($id);

        if (empty($employeeRole)) {
            Flash::error('Employee  Role not found');

            return redirect(route('admin.employeeRoles.index'));
        }

        return view('admin.employee__roles.show')->with('employeeRole', $employeeRole);
    }

    /**
     * Show the form for editing the specified Employee_Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Employee_Role $employeeRole */
        $employeeRole = Employee_Role::find($id);

        if (empty($employeeRole)) {
            Flash::error('Employee  Role not found');

            return redirect(route('admin.employeeRoles.index'));
        }

        return view('admin.employee__roles.edit')->with('employeeRole', $employeeRole);
    }

    /**
     * Update the specified Employee_Role in storage.
     *
     * @param int $id
     * @param UpdateEmployee_RoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployee_RoleRequest $request)
    {
        /** @var Employee_Role $employeeRole */
        $employeeRole = Employee_Role::find($id);

        if (empty($employeeRole)) {
            Flash::error('Employee  Role not found');

            return redirect(route('admin.employeeRoles.index'));
        }

        $employeeRole->fill($request->all());
        $employeeRole->save();

        Flash::success('Employee  Role updated successfully.');

        return redirect(route('admin.employeeRoles.index'));
    }

    /**
     * Remove the specified Employee_Role from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Employee_Role $employeeRole */
        $employeeRole = Employee_Role::find($id);

        if (empty($employeeRole)) {
            Flash::error('Employee  Role not found');

            return redirect(route('admin.employeeRoles.index'));
        }

        $employeeRole->delete();

        Flash::success('Employee  Role deleted successfully.');

        return redirect(route('admin.employeeRoles.index'));
    }
}
