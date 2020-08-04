<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Score;
use Illuminate\Http\Request;
use Flash;
use Response;

class ScoreController extends AppBaseController
{
    /**
     * Display a listing of the Score.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Score $scores */
        $scores = Score::all();

        return view('admin.scores.index')
            ->with('scores', $scores);
    }

    /**
     * Show the form for creating a new Score.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.scores.create');
    }

    /**
     * Store a newly created Score in storage.
     *
     * @param CreateScoreRequest $request
     *
     * @return Response
     */
    public function store(CreateScoreRequest $request)
    {
        $input = $request->all();

        /** @var Score $score */
        $score = Score::create($input);

        Flash::success('Score saved successfully.');

        return redirect(route('admin.scores.index'));
    }

    /**
     * Display the specified Score.
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
            Flash::error('Score not found');

            return redirect(route('admin.scores.index'));
        }

        return view('admin.scores.show')->with('score', $score);
    }

    /**
     * Show the form for editing the specified Score.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Score $score */
        $score = Score::find($id);

        if (empty($score)) {
            Flash::error('Score not found');

            return redirect(route('admin.scores.index'));
        }

        return view('admin.scores.edit')->with('score', $score);
    }

    /**
     * Update the specified Score in storage.
     *
     * @param int $id
     * @param UpdateScoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScoreRequest $request)
    {
        /** @var Score $score */
        $score = Score::find($id);

        if (empty($score)) {
            Flash::error('Score not found');

            return redirect(route('admin.scores.index'));
        }

        $score->fill($request->all());
        $score->save();

        Flash::success('Score updated successfully.');

        return redirect(route('admin.scores.index'));
    }

    /**
     * Remove the specified Score from storage.
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
            Flash::error('Score not found');

            return redirect(route('admin.scores.index'));
        }

        $score->delete();

        Flash::success('Score deleted successfully.');

        return redirect(route('admin.scores.index'));
    }
}
