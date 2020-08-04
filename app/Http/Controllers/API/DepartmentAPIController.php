<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartmentAPIRequest;
use App\Http\Requests\API\UpdateDepartmentAPIRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DepartmentController
 * @package App\Http\Controllers\API
 */

class DepartmentAPIController extends AppBaseController
{
    /**
     * Display a listing of the Department.
     * GET|HEAD /departments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Department::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $departments = $query->get();

        return $this->sendResponse($departments->toArray(), 'Departments retrieved successfully');
    }

    /**
     * Store a newly created Department in storage.
     * POST /departments
     *
     * @param CreateDepartmentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Department $department */
        $department = Department::create($input);

        return $this->sendResponse($department->toArray(), 'Department saved successfully');
    }

    /**
     * Display the specified Department.
     * GET|HEAD /departments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Department $department */
        $department = Department::find($id);

        if (empty($department)) {
            return $this->sendError('Department not found');
        }

        return $this->sendResponse($department->toArray(), 'Department retrieved successfully');
    }

    /**
     * Update the specified Department in storage.
     * PUT/PATCH /departments/{id}
     *
     * @param int $id
     * @param UpdateDepartmentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartmentAPIRequest $request)
    {
        /** @var Department $department */
        $department = Department::find($id);

        if (empty($department)) {
            return $this->sendError('Department not found');
        }

        $department->fill($request->all());
        $department->save();

        return $this->sendResponse($department->toArray(), 'Department updated successfully');
    }

    /**
     * Remove the specified Department from storage.
     * DELETE /departments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Department $department */
        $department = Department::find($id);

        if (empty($department)) {
            return $this->sendError('Department not found');
        }

        $department->delete();

        return $this->sendSuccess('Department deleted successfully');
    }
}
