<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppraisalRequest;
use App\Http\Requests\UpdateAppraisalRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Appraisal;
use Illuminate\Http\Request;
use Flash;
use Response;

class AppraisalController extends AppBaseController
{
    /**
     * Display a listing of the Appraisal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Appraisal $appraisals */
        $appraisals = Appraisal::all();

        return view('admin.appraisals.index')
            ->with('appraisals', $appraisals);
    }

    /**
     * Show the form for creating a new Appraisal.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.appraisals.create');
    }

    /**
     * Store a newly created Appraisal in storage.
     *
     * @param CreateAppraisalRequest $request
     *
     * @return Response
     */
    public function store(CreateAppraisalRequest $request)
    {
        $input = $request->all();

        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::create($input);

        Flash::success('Appraisal saved successfully.');

        return redirect(route('admin.appraisals.index'));
    }

    /**
     * Display the specified Appraisal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::find($id);

        if (empty($appraisal)) {
            Flash::error('Appraisal not found');

            return redirect(route('admin.appraisals.index'));
        }

        return view('admin.appraisals.show')->with('appraisal', $appraisal);
    }

    /**
     * Show the form for editing the specified Appraisal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::find($id);

        if (empty($appraisal)) {
            Flash::error('Appraisal not found');

            return redirect(route('admin.appraisals.index'));
        }

        return view('admin.appraisals.edit')->with('appraisal', $appraisal);
    }

    /**
     * Update the specified Appraisal in storage.
     *
     * @param int $id
     * @param UpdateAppraisalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppraisalRequest $request)
    {
        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::find($id);

        if (empty($appraisal)) {
            Flash::error('Appraisal not found');

            return redirect(route('admin.appraisals.index'));
        }

        $appraisal->fill($request->all());
        $appraisal->save();

        Flash::success('Appraisal updated successfully.');

        return redirect(route('admin.appraisals.index'));
    }

    /**
     * Remove the specified Appraisal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Appraisal $appraisal */
        $appraisal = Appraisal::find($id);

        if (empty($appraisal)) {
            Flash::error('Appraisal not found');

            return redirect(route('admin.appraisals.index'));
        }

        $appraisal->delete();

        Flash::success('Appraisal deleted successfully.');

        return redirect(route('admin.appraisals.index'));
    }
}
