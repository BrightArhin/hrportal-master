<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKpiAPIRequest;
use App\Http\Requests\API\UpdateKpiAPIRequest;
use App\Models\Kpi;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KpiController
 * @package App\Http\Controllers\API
 */

class KpiAPIController extends AppBaseController
{
    /**
     * Display a listing of the Kpi.
     * GET|HEAD /kpis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Kpi::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $kpis = $query->get();

        return $this->sendResponse($kpis->toArray(), 'Kpis retrieved successfully');
    }

    /**
     * Store a newly created Kpi in storage.
     * POST /kpis
     *
     * @param CreateKpiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKpiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kpi $kpi */
        $kpi = Kpi::create($input);

        return $this->sendResponse($kpi->toArray(), 'Kpi saved successfully');
    }

    /**
     * Display the specified Kpi.
     * GET|HEAD /kpis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kpi $kpi */
        $kpi = Kpi::find($id);

        if (empty($kpi)) {
            return $this->sendError('Kpi not found');
        }

        return $this->sendResponse($kpi->toArray(), 'Kpi retrieved successfully');
    }

    /**
     * Update the specified Kpi in storage.
     * PUT/PATCH /kpis/{id}
     *
     * @param int $id
     * @param UpdateKpiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKpiAPIRequest $request)
    {
        /** @var Kpi $kpi */
        $kpi = Kpi::find($id);

        if (empty($kpi)) {
            return $this->sendError('Kpi not found');
        }

        $kpi->fill($request->all());
        $kpi->save();

        return $this->sendResponse($kpi->toArray(), 'Kpi updated successfully');
    }

    /**
     * Remove the specified Kpi from storage.
     * DELETE /kpis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kpi $kpi */
        $kpi = Kpi::find($id);

        if (empty($kpi)) {
            return $this->sendError('Kpi not found');
        }

        $kpi->delete();

        return $this->sendSuccess('Kpi deleted successfully');
    }
}
