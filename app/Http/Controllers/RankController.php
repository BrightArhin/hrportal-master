<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRankRequest;
use App\Http\Requests\UpdateRankRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Rank;
use Illuminate\Http\Request;
use Flash;
use Response;

class RankController extends AppBaseController
{
    /**
     * Display a listing of the Rank.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Rank $ranks */
        $ranks = Rank::all();

        return view('admin.ranks.index')
            ->with('ranks', $ranks);
    }

    /**
     * Show the form for creating a new Rank.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ranks.create');
    }

    /**
     * Store a newly created Rank in storage.
     *
     * @param CreateRankRequest $request
     *
     * @return Response
     */
    public function store(CreateRankRequest $request)
    {
        $input = $request->all();

        /** @var Rank $rank */
        $rank = Rank::create($input);

        Flash::success('Rank saved successfully.');

        return redirect(route('admin.ranks.index'));
    }

    /**
     * Display the specified Rank.
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
            Flash::error('Rank not found');

            return redirect(route('admin.ranks.index'));
        }

        return view('admin.ranks.show')->with('rank', $rank);
    }

    /**
     * Show the form for editing the specified Rank.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Rank $rank */
        $rank = Rank::find($id);

        if (empty($rank)) {
            Flash::error('Rank not found');

            return redirect(route('admin.ranks.index'));
        }

        return view('admin.ranks.edit')->with('rank', $rank);
    }

    /**
     * Update the specified Rank in storage.
     *
     * @param int $id
     * @param UpdateRankRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRankRequest $request)
    {
        /** @var Rank $rank */
        $rank = Rank::find($id);

        if (empty($rank)) {
            Flash::error('Rank not found');

            return redirect(route('admin.ranks.index'));
        }

        $rank->fill($request->all());
        $rank->save();

        Flash::success('Rank updated successfully.');

        return redirect(route('admin.ranks.index'));
    }

    /**
     * Remove the specified Rank from storage.
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
            Flash::error('Rank not found');

            return redirect(route('admin.ranks.index'));
        }

        $rank->delete();

        Flash::success('Rank deleted successfully.');

        return redirect(route('admin.ranks.index'));
    }
}
