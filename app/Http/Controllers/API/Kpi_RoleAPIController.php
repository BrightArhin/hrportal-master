<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKpi_RoleAPIRequest;
use App\Http\Requests\API\UpdateKpi_RoleAPIRequest;
use App\Models\Kpi_Role;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Kpi_RoleController
 * @package App\Http\Controllers\API
 */

class Kpi_RoleAPIController extends AppBaseController
{
    /**
     * Display a listing of the Kpi_Role.
     * GET|HEAD /kpiRoles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Kpi_Role::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $kpiRoles = $query->get();

        return $this->sendResponse($kpiRoles->toArray(), 'Kpi  Roles retrieved successfully');
    }

    /**
     * Store a newly created Kpi_Role in storage.
     * POST /kpiRoles
     *
     * @param CreateKpi_RoleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKpi_RoleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::create($input);

        return $this->sendResponse($kpiRole->toArray(), 'Kpi  Role saved successfully');
    }

    /**
     * Display the specified Kpi_Role.
     * GET|HEAD /kpiRoles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::find($id);

        if (empty($kpiRole)) {
            return $this->sendError('Kpi  Role not found');
        }

        return $this->sendResponse($kpiRole->toArray(), 'Kpi  Role retrieved successfully');
    }

    /**
     * Update the specified Kpi_Role in storage.
     * PUT/PATCH /kpiRoles/{id}
     *
     * @param int $id
     * @param UpdateKpi_RoleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKpi_RoleAPIRequest $request)
    {
        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::find($id);

        if (empty($kpiRole)) {
            return $this->sendError('Kpi  Role not found');
        }

        $kpiRole->fill($request->all());
        $kpiRole->save();

        return $this->sendResponse($kpiRole->toArray(), 'Kpi_Role updated successfully');
    }

    /**
     * Remove the specified Kpi_Role from storage.
     * DELETE /kpiRoles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::find($id);

        if (empty($kpiRole)) {
            return $this->sendError('Kpi  Role not found');
        }

        $kpiRole->delete();

        return $this->sendSuccess('Kpi  Role deleted successfully');
    }
}
