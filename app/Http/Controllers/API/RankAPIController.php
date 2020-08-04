<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRankAPIRequest;
use App\Http\Requests\API\UpdateRankAPIRequest;
use App\Models\Rank;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RankController
 * @package App\Http\Controllers\API
 */

class RankAPIController extends AppBaseController
{
    /**
     * Display a listing of the Rank.
     * GET|HEAD /ranks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Rank::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $ranks = $query->get();

        return $this->sendResponse($ranks->toArray(), 'Ranks retrieved successfully');
    }

    /**
     * Store a newly created Rank in storage.
     * POST /ranks
     *
     * @param CreateRankAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRankAPIRequest $request)
    {
        $input = $request->all();

        /** @var Rank $rank */
        $rank = Rank::create($input);

        return $this->sendResponse($rank->toArray(), 'Rank saved successfully');
    }

    /**
     * Display the specified Rank.
     * GET|HEAD /ranks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Rank $rank */
        $rank = Rank::find($id);

        if (empty($rank)) {
            return $this->sendError('Rank not found');
        }

        return $this->sendResponse($rank->toArray(), 'Rank retrieved successfully');
    }

    /**
     * Update the specified Rank in storage.
     * PUT/PATCH /ranks/{id}
     *
     * @param int $id
     * @param UpdateRankAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRankAPIRequest $request)
    {
        /** @var Rank $rank */
        $rank = Rank::find($id);

        if (empty($rank)) {
            return $this->sendError('Rank not found');
        }

        $rank->fill($request->all());
        $rank->save();

        return $this->sendResponse($rank->toArray(), 'Rank updated successfully');
    }

    /**
     * Remove the specified Rank from storage.
     * DELETE /ranks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Rank $rank */
        $rank = Rank::find($id);

        if (empty($rank)) {
            return $this->sendError('Rank not found');
        }

        $rank->delete();

        return $this->sendSuccess('Rank deleted successfully');
    }
}
