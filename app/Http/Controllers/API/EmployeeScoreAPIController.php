<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployeeScoreAPIRequest;
use App\Http\Requests\API\UpdateEmployeeScoreAPIRequest;
use App\Models\EmployeeScore;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EmployeeScoreController
 * @package App\Http\Controllers\API
 */

class EmployeeScoreAPIController extends AppBaseController
{
    /**
     * Display a listing of the EmployeeScore.
     * GET|HEAD /employeeScores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = EmployeeScore::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $employeeScores = $query->get();

        return $this->sendResponse($employeeScores->toArray(), 'Employee Scores retrieved successfully');
    }

    /**
     * Store a newly created EmployeeScore in storage.
     * POST /employeeScores
     *
     * @param CreateEmployeeScoreAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeScoreAPIRequest $request)
    {
        $input = $request->all();

        /** @var EmployeeScore $employeeScore */
        $employeeScore = EmployeeScore::create($input);

        return $this->sendResponse($employeeScore->toArray(), 'Employee Score saved successfully');
    }

    /**
     * Display the specified EmployeeScore.
     * GET|HEAD /employeeScores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EmployeeScore $employeeScore */
        $employeeScore = EmployeeScore::find($id);

        if (empty($employeeScore)) {
            return $this->sendError('Employee Score not found');
        }

        return $this->sendResponse($employeeScore->toArray(), 'Employee Score retrieved successfully');
    }

    /**
     * Update the specified EmployeeScore in storage.
     * PUT/PATCH /employeeScores/{id}
     *
     * @param int $id
     * @param UpdateEmployeeScoreAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeScoreAPIRequest $request)
    {
        /** @var EmployeeScore $employeeScore */
        $employeeScore = EmployeeScore::find($id);

        if (empty($employeeScore)) {
            return $this->sendError('Employee Score not found');
        }

        $employeeScore->fill($request->all());
        $employeeScore->save();

        return $this->sendResponse($employeeScore->toArray(), 'EmployeeScore updated successfully');
    }

    /**
     * Remove the specified EmployeeScore from storage.
     * DELETE /employeeScores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EmployeeScore $employeeScore */
        $employeeScore = EmployeeScore::find($id);

        if (empty($employeeScore)) {
            return $this->sendError('Employee Score not found');
        }

        $employeeScore->delete();

        return $this->sendSuccess('Employee Score deleted successfully');
    }
}
