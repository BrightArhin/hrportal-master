<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSupervisorScoreAPIRequest;
use App\Http\Requests\API\UpdateSupervisorScoreAPIRequest;
use App\Models\SupervisorScore;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SupervisorScoreController
 * @package App\Http\Controllers\API
 */

class SupervisorScoreAPIController extends AppBaseController
{
    /**
     * Display a listing of the SupervisorScore.
     * GET|HEAD /supervisorScores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SupervisorScore::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $supervisorScores = $query->get();

        return $this->sendResponse($supervisorScores->toArray(), 'Supervisor Scores retrieved successfully');
    }

    /**
     * Store a newly created SupervisorScore in storage.
     * POST /supervisorScores
     *
     * @param CreateSupervisorScoreAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSupervisorScoreAPIRequest $request)
    {
        $input = $request->all();

        /** @var SupervisorScore $supervisorScore */
        $supervisorScore = SupervisorScore::create($input);

        return $this->sendResponse($supervisorScore->toArray(), 'Supervisor Score saved successfully');
    }

    /**
     * Display the specified SupervisorScore.
     * GET|HEAD /supervisorScores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SupervisorScore $supervisorScore */
        $supervisorScore = SupervisorScore::find($id);

        if (empty($supervisorScore)) {
            return $this->sendError('Supervisor Score not found');
        }

        return $this->sendResponse($supervisorScore->toArray(), 'Supervisor Score retrieved successfully');
    }

    /**
     * Update the specified SupervisorScore in storage.
     * PUT/PATCH /supervisorScores/{id}
     *
     * @param int $id
     * @param UpdateSupervisorScoreAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupervisorScoreAPIRequest $request)
    {
        /** @var SupervisorScore $supervisorScore */
        $supervisorScore = SupervisorScore::find($id);

        if (empty($supervisorScore)) {
            return $this->sendError('Supervisor Score not found');
        }

        $supervisorScore->fill($request->all());
        $supervisorScore->save();

        return $this->sendResponse($supervisorScore->toArray(), 'SupervisorScore updated successfully');
    }

    /**
     * Remove the specified SupervisorScore from storage.
     * DELETE /supervisorScores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SupervisorScore $supervisorScore */
        $supervisorScore = SupervisorScore::find($id);

        if (empty($supervisorScore)) {
            return $this->sendError('Supervisor Score not found');
        }

        $supervisorScore->delete();

        return $this->sendSuccess('Supervisor Score deleted successfully');
    }
}
