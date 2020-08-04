<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAppraisalAPIRequest;
use App\Http\Requests\API\UpdateAppraisalAPIRequest;
use App\Models\Appraisal;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AppraisalController
 * @package App\Http\Controllers\API
 */

class AppraisalAPIController extends AppBaseController
{
    /**
     * Display a listing of the Appraisal.
     * GET|HEAD /appraisals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Appraisal::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $appraisals = $query->get();

        return $this->sendResponse($appraisals->toArray(), 'Appraisals retrieved successfully');
    }

    /**
     * Store a newly created Appraisal in storage.
     * POST /appraisals
     *
     * @param CreateAppraisalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAppraisalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::create($input);

        return $this->sendResponse($appraisal->toArray(), 'Appraisal saved successfully');
    }

    /**
     * Display the specified Appraisal.
     * GET|HEAD /appraisals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::find($id);

        if (empty($appraisal)) {
            return $this->sendError('Appraisal not found');
        }

        return $this->sendResponse($appraisal->toArray(), 'Appraisal retrieved successfully');
    }

    /**
     * Update the specified Appraisal in storage.
     * PUT/PATCH /appraisals/{id}
     *
     * @param int $id
     * @param UpdateAppraisalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppraisalAPIRequest $request)
    {
        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::find($id);

        if (empty($appraisal)) {
            return $this->sendError('Appraisal not found');
        }

        $appraisal->fill($request->all());
        $appraisal->save();

        return $this->sendResponse($appraisal->toArray(), 'Appraisal updated successfully');
    }

    /**
     * Remove the specified Appraisal from storage.
     * DELETE /appraisals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::find($id);

        if (empty($appraisal)) {
            return $this->sendError('Appraisal not found');
        }

        $appraisal->delete();

        return $this->sendSuccess('Appraisal deleted successfully');
    }
}
