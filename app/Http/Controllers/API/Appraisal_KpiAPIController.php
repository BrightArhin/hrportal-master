<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAppraisal_KpiAPIRequest;
use App\Http\Requests\API\UpdateAppraisal_KpiAPIRequest;
use App\Models\Appraisal_Kpi;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Appraisal_KpiController
 * @package App\Http\Controllers\API
 */

class Appraisal_KpiAPIController extends AppBaseController
{
    /**
     * Display a listing of the Appraisal_Kpi.
     * GET|HEAD /appraisalKpis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Appraisal_Kpi::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $appraisalKpis = $query->get();

        return $this->sendResponse($appraisalKpis->toArray(), 'Appraisal  Kpis retrieved successfully');
    }

    /**
     * Store a newly created Appraisal_Kpi in storage.
     * POST /appraisalKpis
     *
     * @param CreateAppraisal_KpiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAppraisal_KpiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::create($input);

        return $this->sendResponse($appraisalKpi->toArray(), 'Appraisal  Kpi saved successfully');
    }

    /**
     * Display the specified Appraisal_Kpi.
     * GET|HEAD /appraisalKpis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::find($id);

        if (empty($appraisalKpi)) {
            return $this->sendError('Appraisal  Kpi not found');
        }

        return $this->sendResponse($appraisalKpi->toArray(), 'Appraisal  Kpi retrieved successfully');
    }

    /**
     * Update the specified Appraisal_Kpi in storage.
     * PUT/PATCH /appraisalKpis/{id}
     *
     * @param int $id
     * @param UpdateAppraisal_KpiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppraisal_KpiAPIRequest $request)
    {
        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::find($id);

        if (empty($appraisalKpi)) {
            return $this->sendError('Appraisal  Kpi not found');
        }

        $appraisalKpi->fill($request->all());
        $appraisalKpi->save();

        return $this->sendResponse($appraisalKpi->toArray(), 'Appraisal_Kpi updated successfully');
    }

    /**
     * Remove the specified Appraisal_Kpi from storage.
     * DELETE /appraisalKpis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::find($id);

        if (empty($appraisalKpi)) {
            return $this->sendError('Appraisal  Kpi not found');
        }

        $appraisalKpi->delete();

        return $this->sendSuccess('Appraisal  Kpi deleted successfully');
    }
}
