<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQualificationAPIRequest;
use App\Http\Requests\API\UpdateQualificationAPIRequest;
use App\Models\Qualification;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class QualificationController
 * @package App\Http\Controllers\API
 */

class QualificationAPIController extends AppBaseController
{
    /**
     * Display a listing of the Qualification.
     * GET|HEAD /qualifications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Qualification::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $qualifications = $query->get();

        return $this->sendResponse($qualifications->toArray(), 'Qualifications retrieved successfully');
    }

    /**
     * Store a newly created Qualification in storage.
     * POST /qualifications
     *
     * @param CreateQualificationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQualificationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Qualification $qualification */
        $qualification = Qualification::create($input);

        return $this->sendResponse($qualification->toArray(), 'Qualification saved successfully');
    }

    /**
     * Display the specified Qualification.
     * GET|HEAD /qualifications/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Qualification $qualification */
        $qualification = Qualification::find($id);

        if (empty($qualification)) {
            return $this->sendError('Qualification not found');
        }

        return $this->sendResponse($qualification->toArray(), 'Qualification retrieved successfully');
    }

    /**
     * Update the specified Qualification in storage.
     * PUT/PATCH /qualifications/{id}
     *
     * @param int $id
     * @param UpdateQualificationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQualificationAPIRequest $request)
    {
        /** @var Qualification $qualification */
        $qualification = Qualification::find($id);

        if (empty($qualification)) {
            return $this->sendError('Qualification not found');
        }

        $qualification->fill($request->all());
        $qualification->save();

        return $this->sendResponse($qualification->toArray(), 'Qualification updated successfully');
    }

    /**
     * Remove the specified Qualification from storage.
     * DELETE /qualifications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Qualification $qualification */
        $qualification = Qualification::find($id);

        if (empty($qualification)) {
            return $this->sendError('Qualification not found');
        }

        $qualification->delete();

        return $this->sendSuccess('Qualification deleted successfully');
    }
}
