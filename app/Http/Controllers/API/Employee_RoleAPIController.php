<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployee_RoleAPIRequest;
use App\Http\Requests\API\UpdateEmployee_RoleAPIRequest;
use App\Models\Employee_Role;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Employee_RoleController
 * @package App\Http\Controllers\API
 */

class Employee_RoleAPIController extends AppBaseController
{
    /**
     * Display a listing of the Employee_Role.
     * GET|HEAD /employeeRoles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Employee_Role::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $employeeRoles = $query->get();

        return $this->sendResponse($employeeRoles->toArray(), 'Employee  Roles retrieved successfully');
    }

    /**
     * Store a newly created Employee_Role in storage.
     * POST /employeeRoles
     *
     * @param CreateEmployee_RoleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployee_RoleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Employee_Role $employeeRole */
        $employeeRole = Employee_Role::create($input);

        return $this->sendResponse($employeeRole->toArray(), 'Employee  Role saved successfully');
    }

    /**
     * Display the specified Employee_Role.
     * GET|HEAD /employeeRoles/{id}
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
            return $this->sendError('Employee  Role not found');
        }

        return $this->sendResponse($employeeRole->toArray(), 'Employee  Role retrieved successfully');
    }

    /**
     * Update the specified Employee_Role in storage.
     * PUT/PATCH /employeeRoles/{id}
     *
     * @param int $id
     * @param UpdateEmployee_RoleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployee_RoleAPIRequest $request)
    {
        /** @var Employee_Role $employeeRole */
        $employeeRole = Employee_Role::find($id);

        if (empty($employeeRole)) {
            return $this->sendError('Employee  Role not found');
        }

        $employeeRole->fill($request->all());
        $employeeRole->save();

        return $this->sendResponse($employeeRole->toArray(), 'Employee_Role updated successfully');
    }

    /**
     * Remove the specified Employee_Role from storage.
     * DELETE /employeeRoles/{id}
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
            return $this->sendError('Employee  Role not found');
        }

        $employeeRole->delete();

        return $this->sendSuccess('Employee  Role deleted successfully');
    }
}
