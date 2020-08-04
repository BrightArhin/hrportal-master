<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Grade;
use Illuminate\Http\Request;
use Flash;
use Response;

class GradeController extends AppBaseController
{
    /**
     * Display a listing of the Grade.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Grade $grades */
        $grades = Grade::all();

        return view('admin.grades.index')
            ->with('grades', $grades);
    }

    /**
     * Show the form for creating a new Grade.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.grades.create');
    }

    /**
     * Store a newly created Grade in storage.
     *
     * @param CreateGradeRequest $request
     *
     * @return Response
     */
    public function store(CreateGradeRequest $request)
    {
        $input = $request->all();

        /** @var Grade $grade */
        $grade = Grade::create($input);

        Flash::success('Grade saved successfully.');

        return redirect(route('admin.grades.index'));
    }

    /**
     * Display the specified Grade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Grade $grade */
        $grade = Grade::find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        return view('admin.grades.show')->with('grade', $grade);
    }

    /**
     * Show the form for editing the specified Grade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Grade $grade */
        $grade = Grade::find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        return view('admin.grades.edit')->with('grade', $grade);
    }

    /**
     * Update the specified Grade in storage.
     *
     * @param int $id
     * @param UpdateGradeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradeRequest $request)
    {
        /** @var Grade $grade */
        $grade = Grade::find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        $grade->fill($request->all());
        $grade->save();

        Flash::success('Grade updated successfully.');

        return redirect(route('admin.grades.index'));
    }

    /**
     * Remove the specified Grade from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Grade $grade */
        $grade = Grade::find($id);

        if (empty($grade)) {
            Flash::error('Grade not found');

            return redirect(route('admin.grades.index'));
        }

        $grade->delete();

        Flash::success('Grade deleted successfully.');

        return redirect(route('admin.grades.index'));
    }
}
