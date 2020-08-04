<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKpiRequest;
use App\Http\Requests\UpdateKpiRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Kpi;
use Illuminate\Http\Request;
use Flash;
use Response;

class KpiController extends AppBaseController
{
    /**
     * Display a listing of the Kpi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Kpi $kpis */
        $kpis = Kpi::all();

        return view('admin.kpis.index')
            ->with('kpis', $kpis);
    }

    /**
     * Show the form for creating a new Kpi.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.kpis.create');
    }

    /**
     * Store a newly created Kpi in storage.
     *
     * @param CreateKpiRequest $request
     *
     * @return Response
     */
    public function store(CreateKpiRequest $request)
    {
        $input = $request->all();

        /** @var Kpi $kpi */
        $kpi = Kpi::create($input);

        Flash::success('Kpi saved successfully.');

        return redirect(route('admin.kpis.index'));
    }

    /**
     * Display the specified Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kpi $kpi */
        $kpi = Kpi::find($id);

        if (empty($kpi)) {
            Flash::error('Kpi not found');

            return redirect(route('admin.kpis.index'));
        }

        return view('admin.kpis.show')->with('kpi', $kpi);
    }

    /**
     * Show the form for editing the specified Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Kpi $kpi */
        $kpi = Kpi::find($id);

        if (empty($kpi)) {
            Flash::error('Kpi not found');

            return redirect(route('admin.kpis.index'));
        }

        return view('admin.kpis.edit')->with('kpi', $kpi);
    }

    /**
     * Update the specified Kpi in storage.
     *
     * @param int $id
     * @param UpdateKpiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKpiRequest $request)
    {
        /** @var Kpi $kpi */
        $kpi = Kpi::find($id);

        if (empty($kpi)) {
            Flash::error('Kpi not found');

            return redirect(route('admin.kpis.index'));
        }

        $kpi->fill($request->all());
        $kpi->save();

        Flash::success('Kpi updated successfully.');

        return redirect(route('admin.kpis.index'));
    }

    /**
     * Remove the specified Kpi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kpi $kpi */
        $kpi = Kpi::find($id);

        if (empty($kpi)) {
            Flash::error('Kpi not found');

            return redirect(route('admin.kpis.index'));
        }

        $kpi->delete();

        Flash::success('Kpi deleted successfully.');

        return redirect(route('admin.kpis.index'));
    }
}
