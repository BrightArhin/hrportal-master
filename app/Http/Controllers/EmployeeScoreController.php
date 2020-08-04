<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeScoreRequest;
use App\Http\Requests\UpdateEmployeeScoreRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\EmployeeScore;
use Illuminate\Http\Request;
use Flash;
use Response;

class EmployeeScoreController extends AppBaseController
{
    /**
     * Display a listing of the EmployeeScore.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var EmployeeScore $employeeScores */
        $employeeScores = EmployeeScore::all();

        return view('admin.employee_scores.index')
            ->with('employeeScores', $employeeScores);
    }

    /**
     * Show the form for creating a new EmployeeScore.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.employee_scores.create');
    }

    /**
     * Store a newly created EmployeeScore in storage.
     *
     * @param CreateEmployeeScoreRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeScoreRequest $request)
    {
        $input = $request->all();

        /** @var EmployeeScore $employeeScore */
        $employeeScore = EmployeeScore::create($input);

        Flash::success('Employee Score saved successfully.');

        return redirect(route('admin.employeeScores.index'));
    }

    /**
     * Display the specified EmployeeScore.
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
            Flash::error('Employee Score not found');

            return redirect(route('admin.employeeScores.index'));
        }

        return view('admin.employee_scores.show')->with('employeeScore', $employeeScore);
    }

    /**
     * Show the form for editing the specified EmployeeScore.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var EmployeeScore $employeeScore */
        $employeeScore = EmployeeScore::find($id);

        if (empty($employeeScore)) {
            Flash::error('Employee Score not found');

            return redirect(route('admin.employeeScores.index'));
        }

        return view('admin.employee_scores.edit')->with('employeeScore', $employeeScore);
    }

    /**
     * Update the specified EmployeeScore in storage.
     *
     * @param int $id
     * @param UpdateEmployeeScoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeScoreRequest $request)
    {
        /** @var EmployeeScore $employeeScore */
        $employeeScore = EmployeeScore::find($id);

        if (empty($employeeScore)) {
            Flash::error('Employee Score not found');

            return redirect(route('admin.employeeScores.index'));
        }

        $employeeScore->fill($request->all());
        $employeeScore->save();

        Flash::success('Employee Score updated successfully.');

        return redirect(route('admin.employeeScores.index'));
    }

    /**
     * Remove the specified EmployeeScore from storage.
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
            Flash::error('Employee Score not found');

            return redirect(route('admin.employeeScores.index'));
        }

        $employeeScore->delete();

        Flash::success('Employee Score deleted successfully.');

        return redirect(route('admin.employeeScores.index'));
    }
}
