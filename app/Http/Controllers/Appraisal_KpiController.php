<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppraisal_KpiRequest;
use App\Http\Requests\UpdateAppraisal_KpiRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Appraisal_Kpi;
use Illuminate\Http\Request;
use Flash;
use Response;

class Appraisal_KpiController extends AppBaseController
{
    /**
     * Display a listing of the Appraisal_Kpi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Appraisal_Kpi $appraisalKpis */
        $appraisalKpis = Appraisal_Kpi::all();

        return view('admin.appraisal__kpis.index')
            ->with('appraisalKpis', $appraisalKpis);
    }

    /**
     * Show the form for creating a new Appraisal_Kpi.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.appraisal__kpis.create');
    }

    /**
     * Store a newly created Appraisal_Kpi in storage.
     *
     * @param CreateAppraisal_KpiRequest $request
     *
     * @return Response
     */
    public function store(CreateAppraisal_KpiRequest $request)
    {
        $input = $request->all();

        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::create($input);

        Flash::success('Appraisal  Kpi saved successfully.');

        return redirect(route('admin.appraisalKpis.index'));
    }

    /**
     * Display the specified Appraisal_Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::find($id);

        if (empty($appraisalKpi)) {
            Flash::error('Appraisal  Kpi not found');

            return redirect(route('admin.appraisalKpis.index'));
        }

        return view('admin.appraisal__kpis.show')->with('appraisalKpi', $appraisalKpi);
    }

    /**
     * Show the form for editing the specified Appraisal_Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::find($id);

        if (empty($appraisalKpi)) {
            Flash::error('Appraisal  Kpi not found');

            return redirect(route('admin.appraisalKpis.index'));
        }

        return view('admin.appraisal__kpis.edit')->with('appraisalKpi', $appraisalKpi);
    }

    /**
     * Update the specified Appraisal_Kpi in storage.
     *
     * @param int $id
     * @param UpdateAppraisal_KpiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppraisal_KpiRequest $request)
    {
        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::find($id);

        if (empty($appraisalKpi)) {
            Flash::error('Appraisal  Kpi not found');

            return redirect(route('admin.appraisalKpis.index'));
        }

        $appraisalKpi->fill($request->all());
        $appraisalKpi->save();

        Flash::success('Appraisal  Kpi updated successfully.');

        return redirect(route('admin.appraisalKpis.index'));
    }

    /**
     * Remove the specified Appraisal_Kpi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Appraisal_Kpi $appraisalKpi */
        $appraisalKpi = Appraisal_Kpi::find($id);

        if (empty($appraisalKpi)) {
            Flash::error('Appraisal  Kpi not found');

            return redirect(route('admin.appraisalKpis.index'));
        }

        $appraisalKpi->delete();

        Flash::success('Appraisal  Kpi deleted successfully.');

        return redirect(route('admin.appraisalKpis.index'));
    }
}
