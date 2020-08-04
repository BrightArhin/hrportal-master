<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKpi_RoleRequest;
use App\Http\Requests\UpdateKpi_RoleRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Kpi_Role;
use Illuminate\Http\Request;
use Flash;
use Response;

class Kpi_RoleController extends AppBaseController
{
    /**
     * Display a listing of the Kpi_Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Kpi_Role $kpiRoles */
        $kpiRoles = Kpi_Role::all();

        return view('admin.kpi__roles.index')
            ->with('kpiRoles', $kpiRoles);
    }

    /**
     * Show the form for creating a new Kpi_Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.kpi__roles.create');
    }

    /**
     * Store a newly created Kpi_Role in storage.
     *
     * @param CreateKpi_RoleRequest $request
     *
     * @return Response
     */
    public function store(CreateKpi_RoleRequest $request)
    {
        $input = $request->all();

        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::create($input);

        Flash::success('Kpi  Role saved successfully.');

        return redirect(route('admin.kpiRoles.index'));
    }

    /**
     * Display the specified Kpi_Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::find($id);

        if (empty($kpiRole)) {
            Flash::error('Kpi  Role not found');

            return redirect(route('admin.kpiRoles.index'));
        }

        return view('admin.kpi__roles.show')->with('kpiRole', $kpiRole);
    }

    /**
     * Show the form for editing the specified Kpi_Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::find($id);

        if (empty($kpiRole)) {
            Flash::error('Kpi  Role not found');

            return redirect(route('admin.kpiRoles.index'));
        }

        return view('admin.kpi__roles.edit')->with('kpiRole', $kpiRole);
    }

    /**
     * Update the specified Kpi_Role in storage.
     *
     * @param int $id
     * @param UpdateKpi_RoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKpi_RoleRequest $request)
    {
        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::find($id);

        if (empty($kpiRole)) {
            Flash::error('Kpi  Role not found');

            return redirect(route('admin.kpiRoles.index'));
        }

        $kpiRole->fill($request->all());
        $kpiRole->save();

        Flash::success('Kpi  Role updated successfully.');

        return redirect(route('admin.kpiRoles.index'));
    }

    /**
     * Remove the specified Kpi_Role from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kpi_Role $kpiRole */
        $kpiRole = Kpi_Role::find($id);

        if (empty($kpiRole)) {
            Flash::error('Kpi  Role not found');

            return redirect(route('admin.kpiRoles.index'));
        }

        $kpiRole->delete();

        Flash::success('Kpi  Role deleted successfully.');

        return redirect(route('admin.kpiRoles.index'));
    }
}
