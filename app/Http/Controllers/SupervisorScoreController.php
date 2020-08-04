<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupervisorScoreRequest;
use App\Http\Requests\UpdateSupervisorScoreRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\SupervisorScore;
use Illuminate\Http\Request;
use Flash;
use Response;

class SupervisorScoreController extends AppBaseController
{
    /**
     * Display a listing of the SupervisorScore.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SupervisorScore $supervisorScores */
        $supervisorScores = SupervisorScore::all();

        return view('admin.supervisor_scores.index')
            ->with('supervisorScores', $supervisorScores);
    }

    /**
     * Show the form for creating a new SupervisorScore.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.supervisor_scores.create');
    }

    /**
     * Store a newly created SupervisorScore in storage.
     *
     * @param CreateSupervisorScoreRequest $request
     *
     * @return Response
     */
    public function store(CreateSupervisorScoreRequest $request)
    {
        $input = $request->all();

        /** @var SupervisorScore $supervisorScore */
        $supervisorScore = SupervisorScore::create($input);

        Flash::success('Supervisor Score saved successfully.');

        return redirect(route('admin.supervisorScores.index'));
    }

    /**
     * Display the specified SupervisorScore.
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
            Flash::error('Supervisor Score not found');

            return redirect(route('admin.supervisorScores.index'));
        }

        return view('admin.supervisor_scores.show')->with('supervisorScore', $supervisorScore);
    }

    /**
     * Show the form for editing the specified SupervisorScore.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SupervisorScore $supervisorScore */
        $supervisorScore = SupervisorScore::find($id);

        if (empty($supervisorScore)) {
            Flash::error('Supervisor Score not found');

            return redirect(route('admin.supervisorScores.index'));
        }

        return view('admin.supervisor_scores.edit')->with('supervisorScore', $supervisorScore);
    }

    /**
     * Update the specified SupervisorScore in storage.
     *
     * @param int $id
     * @param UpdateSupervisorScoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupervisorScoreRequest $request)
    {
        /** @var SupervisorScore $supervisorScore */
        $supervisorScore = SupervisorScore::find($id);

        if (empty($supervisorScore)) {
            Flash::error('Supervisor Score not found');

            return redirect(route('admin.supervisorScores.index'));
        }

        $supervisorScore->fill($request->all());
        $supervisorScore->save();

        Flash::success('Supervisor Score updated successfully.');

        return redirect(route('admin.supervisorScores.index'));
    }

    /**
     * Remove the specified SupervisorScore from storage.
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
            Flash::error('Supervisor Score not found');

            return redirect(route('admin.supervisorScores.index'));
        }

        $supervisorScore->delete();

        Flash::success('Supervisor Score deleted successfully.');

        return redirect(route('admin.supervisorScores.index'));
    }
}
