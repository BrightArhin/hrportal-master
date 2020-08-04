<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateScore_KpiAPIRequest;
use App\Http\Requests\API\UpdateScore_KpiAPIRequest;
use App\Models\Score_Kpi;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Score_KpiController
 * @package App\Http\Controllers\API
 */

class Score_KpiAPIController extends AppBaseController
{
    /**
     * Display a listing of the Score_Kpi.
     * GET|HEAD /scoreKpis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Score_Kpi::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $scoreKpis = $query->get();

        return $this->sendResponse($scoreKpis->toArray(), 'Score  Kpis retrieved successfully');
    }

    /**
     * Store a newly created Score_Kpi in storage.
     * POST /scoreKpis
     *
     * @param CreateScore_KpiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateScore_KpiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::create($input);

        return $this->sendResponse($scoreKpi->toArray(), 'Score  Kpi saved successfully');
    }

    /**
     * Display the specified Score_Kpi.
     * GET|HEAD /scoreKpis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::find($id);

        if (empty($scoreKpi)) {
            return $this->sendError('Score  Kpi not found');
        }

        return $this->sendResponse($scoreKpi->toArray(), 'Score  Kpi retrieved successfully');
    }

    /**
     * Update the specified Score_Kpi in storage.
     * PUT/PATCH /scoreKpis/{id}
     *
     * @param int $id
     * @param UpdateScore_KpiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScore_KpiAPIRequest $request)
    {
        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::find($id);

        if (empty($scoreKpi)) {
            return $this->sendError('Score  Kpi not found');
        }

        $scoreKpi->fill($request->all());
        $scoreKpi->save();

        return $this->sendResponse($scoreKpi->toArray(), 'Score_Kpi updated successfully');
    }

    /**
     * Remove the specified Score_Kpi from storage.
     * DELETE /scoreKpis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::find($id);

        if (empty($scoreKpi)) {
            return $this->sendError('Score  Kpi not found');
        }

        $scoreKpi->delete();

        return $this->sendSuccess('Score  Kpi deleted successfully');
    }
}
