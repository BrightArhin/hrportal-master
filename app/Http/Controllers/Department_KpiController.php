<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartment_KpiRequest;
use App\Http\Requests\UpdateDepartment_KpiRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Department_Kpi;
use Illuminate\Http\Request;
use Flash;
use Response;

class Department_KpiController extends AppBaseController
{
    /**
     * Display a listing of the Department_Kpi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Department_Kpi $departmentKpis */
        $departmentKpis = Department_Kpi::all();

        return view('admin.department__kpis.index')
            ->with('departmentKpis', $departmentKpis);
    }

    /**
     * Show the form for creating a new Department_Kpi.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.department__kpis.create');
    }

    /**
     * Store a newly created Department_Kpi in storage.
     *
     * @param CreateDepartment_KpiRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartment_KpiRequest $request)
    {
        $input = $request->all();

        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::create($input);

        Flash::success('Department  Kpi saved successfully.');

        return redirect(route('admin.departmentKpis.index'));
    }

    /**
     * Display the specified Department_Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::find($id);

        if (empty($departmentKpi)) {
            Flash::error('Department  Kpi not found');

            return redirect(route('admin.departmentKpis.index'));
        }

        return view('admin.department__kpis.show')->with('departmentKpi', $departmentKpi);
    }

    /**
     * Show the form for editing the specified Department_Kpi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::find($id);

        if (empty($departmentKpi)) {
            Flash::error('Department  Kpi not found');

            return redirect(route('admin.departmentKpis.index'));
        }

        return view('admin.department__kpis.edit')->with('departmentKpi', $departmentKpi);
    }

    /**
     * Update the specified Department_Kpi in storage.
     *
     * @param int $id
     * @param UpdateDepartment_KpiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartment_KpiRequest $request)
    {
        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::find($id);

        if (empty($departmentKpi)) {
            Flash::error('Department  Kpi not found');

            return redirect(route('admin.departmentKpis.index'));
        }

        $departmentKpi->fill($request->all());
        $departmentKpi->save();

        Flash::success('Department  Kpi updated successfully.');

        return redirect(route('admin.departmentKpis.index'));
    }

    /**
     * Remove the specified Department_Kpi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Department_Kpi $departmentKpi */
        $departmentKpi = Department_Kpi::find($id);

        if (empty($departmentKpi)) {
            Flash::error('Department  Kpi not found');

            return redirect(route('admin.departmentKpis.index'));
        }

        $departmentKpi->delete();

        Flash::success('Department  Kpi deleted successfully.');

        return redirect(route('admin.departmentKpis.index'));
    }
}
