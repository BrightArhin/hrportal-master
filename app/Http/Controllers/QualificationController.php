<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQualificationRequest;
use App\Http\Requests\UpdateQualificationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Flash;
use Response;

class QualificationController extends AppBaseController
{
    /**
     * Display a listing of the Qualification.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Qualification $qualifications */
        $qualifications = Qualification::all();

        return view('admin.qualifications.index')
            ->with('qualifications', $qualifications);
    }

    /**
     * Show the form for creating a new Qualification.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.qualifications.create');
    }

    /**
     * Store a newly created Qualification in storage.
     *
     * @param CreateQualificationRequest $request
     *
     * @return Response
     */
    public function store(CreateQualificationRequest $request)
    {
        $input = $request->all();

        /** @var Qualification $qualification */
        $qualification = Qualification::create($input);

        Flash::success('Qualification saved successfully.');

        return redirect(route('admin.qualifications.index'));
    }

    /**
     * Display the specified Qualification.
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
            Flash::error('Qualification not found');

            return redirect(route('admin.qualifications.index'));
        }

        return view('admin.qualifications.show')->with('qualification', $qualification);
    }

    /**
     * Show the form for editing the specified Qualification.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Qualification $qualification */
        $qualification = Qualification::find($id);

        if (empty($qualification)) {
            Flash::error('Qualification not found');

            return redirect(route('admin.qualifications.index'));
        }

        return view('admin.qualifications.edit')->with('qualification', $qualification);
    }

    /**
     * Update the specified Qualification in storage.
     *
     * @param int $id
     * @param UpdateQualificationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQualificationRequest $request)
    {
        /** @var Qualification $qualification */
        $qualification = Qualification::find($id);

        if (empty($qualification)) {
            Flash::error('Qualification not found');

            return redirect(route('admin.qualifications.index'));
        }

        $qualification->fill($request->all());
        $qualification->save();

        Flash::success('Qualification updated successfully.');

        return redirect(route('admin.qualifications.index'));
    }

    /**
     * Remove the specified Qualification from storage.
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
            Flash::error('Qualification not found');

            return redirect(route('admin.qualifications.index'));
        }

        $qualification->delete();

        Flash::success('Qualification deleted successfully.');

        return redirect(route('admin.qualifications.index'));
    }
}
