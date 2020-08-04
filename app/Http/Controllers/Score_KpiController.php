<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateScore_KpiRequest;
use App\Http\Requests\UpdateScore_KpiRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Score_Kpi;
use Illuminate\Http\Request;
use Flash;
use Response;

class Score_KpiController extends AppBaseController
{
    /**
     * Display a listing of the Score_Kpi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Score_Kpi $scoreKpis */
        $scoreKpis = Score_Kpi::all();

        return view('admin.score__kpis.index')
            ->with('scoreKpis', $scoreKpis);
    }

    /**
     * Show the form for creating a new Score_Kpi.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.score__kpis.create');
    }

    /**
     * Store a newly created Score_Kpi in storage.
     *
     * @param CreateScore_KpiRequest $request
     *
     * @return Response
     */
    public function store(CreateScore_KpiRequest $request)
    {
        $input = $request->all();

        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::create($input);

        Flash::success('Score  Kpi saved successfully.');

        return redirect(route('admin.scoreKpis.index'));
    }

    /**
     * Display the specified Score_Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::find($id);

        if (empty($scoreKpi)) {
            Flash::error('Score  Kpi not found');

            return redirect(route('admin.scoreKpis.index'));
        }

        return view('admin.score__kpis.show')->with('scoreKpi', $scoreKpi);
    }

    /**
     * Show the form for editing the specified Score_Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::find($id);

        if (empty($scoreKpi)) {
            Flash::error('Score  Kpi not found');

            return redirect(route('admin.scoreKpis.index'));
        }

        return view('admin.score__kpis.edit')->with('scoreKpi', $scoreKpi);
    }

    /**
     * Update the specified Score_Kpi in storage.
     *
     * @param int $id
     * @param UpdateScore_KpiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScore_KpiRequest $request)
    {
        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::find($id);

        if (empty($scoreKpi)) {
            Flash::error('Score  Kpi not found');

            return redirect(route('admin.scoreKpis.index'));
        }

        $scoreKpi->fill($request->all());
        $scoreKpi->save();

        Flash::success('Score  Kpi updated successfully.');

        return redirect(route('admin.scoreKpis.index'));
    }

    /**
     * Remove the specified Score_Kpi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Score_Kpi $scoreKpi */
        $scoreKpi = Score_Kpi::find($id);

        if (empty($scoreKpi)) {
            Flash::error('Score  Kpi not found');

            return redirect(route('admin.scoreKpis.index'));
        }

        $scoreKpi->delete();

        Flash::success('Score  Kpi deleted successfully.');

        return redirect(route('admin.scoreKpis.index'));
    }
}
