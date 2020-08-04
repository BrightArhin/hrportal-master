<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartment_KpiAPIRequest;
use App\Http\Requests\API\UpdateDepartment_KpiAPIRequest;
use App\Models\Department_Kpi;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Department_KpiController
 * @package App\Http\Controllers\API
 */

class Department_KpiAPIController extends AppBaseController
{
    /**
     * Display a listing of the Department_Kpi.
     * GET|HEAD /departmentKpis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Department_Kpi::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $departmentKpis = $query->get();

        return $this->sendResponse($departmentKpis->toArray(), 'Department  Kpis retrieved successfully');
    }

    /**
     * Store a newly created Department_Kpi in storage.
     * POST /departmentKpis
     *
     * @param CreateDepartment_KpiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartment_KpiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::create($input);

        return $this->sendResponse($departmentKpi->toArray(), 'Department  Kpi saved successfully');
    }

    /**
     * Display the specified Department_Kpi.
     * GET|HEAD /departmentKpis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::find($id);

        if (empty($departmentKpi)) {
            return $this->sendError('Department  Kpi not found');
        }

        return $this->sendResponse($departmentKpi->toArray(), 'Department  Kpi retrieved successfully');
    }

    /**
     * Update the specified Department_Kpi in storage.
     * PUT/PATCH /departmentKpis/{id}
     *
     * @param int $id
     * @param UpdateDepartment_KpiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartment_KpiAPIRequest $request)
    {
        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::find($id);

        if (empty($departmentKpi)) {
            return $this->sendError('Department  Kpi not found');
        }

        $departmentKpi->fill($request->all());
        $departmentKpi->save();

        return $this->sendResponse($departmentKpi->toArray(), 'Department_Kpi updated successfully');
    }

    /**
     * Remove the specified Department_Kpi from storage.
     * DELETE /departmentKpis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::find($id);

        if (empty($departmentKpi)) {
            return $this->sendError('Department  Kpi not found');
        }

        $departmentKpi->delete();

        return $this->sendSuccess('Department  Kpi deleted successfully');
    }
}
