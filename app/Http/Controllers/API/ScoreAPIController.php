<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateScoreAPIRequest;
use App\Http\Requests\API\UpdateScoreAPIRequest;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ScoreController
 * @package App\Http\Controllers\API
 */

class ScoreAPIController extends AppBaseController
{
    /**
     * Display a listing of the Score.
     * GET|HEAD /scores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Score::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $scores = $query->get();

        return $this->sendResponse($scores->toArray(), 'Scores retrieved successfully');
    }

    /**
     * Store a newly created Score in storage.
     * POST /scores
     *
     * @param CreateScoreAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateScoreAPIRequest $request)
    {
        $input = $request->all();

        /** @var Score $score */
        $score = Score::create($input);

        return $this->sendResponse($score->toArray(), 'Score saved successfully');
    }

    /**
     * Display the specified Score.
     * GET|HEAD /scores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Score $score */
        $score = Score::find($id);

        if (empty($score)) {
            return $this->sendError('Score not found');
        }

        return $this->sendResponse($score->toArray(), 'Score retrieved successfully');
    }

    /**
     * Update the specified Score in storage.
     * PUT/PATCH /scores/{id}
     *
     * @param int $id
     * @param UpdateScoreAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScoreAPIRequest $request)
    {
        /** @var Score $score */
        $score = Score::find($id);

        if (empty($score)) {
            return $this->sendError('Score not found');
        }

        $score->fill($request->all());
        $score->save();

        return $this->sendResponse($score->toArray(), 'Score updated successfully');
    }

    /**
     * Remove the specified Score from storage.
     * DELETE /scores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Score $score */
        $score = Score::find($id);

        if (empty($score)) {
            return $this->sendError('Score not found');
        }

        $score->delete();

        return $this->sendSuccess('Score deleted successfully');
    }
}
