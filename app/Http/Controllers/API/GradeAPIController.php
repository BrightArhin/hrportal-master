<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGradeAPIRequest;
use App\Http\Requests\API\UpdateGradeAPIRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GradeController
 * @package App\Http\Controllers\API
 */

class GradeAPIController extends AppBaseController
{
    /**
     * Display a listing of the Grade.
     * GET|HEAD /grades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Grade::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $grades = $query->get();

        return $this->sendResponse($grades->toArray(), 'Grades retrieved successfully');
    }

    /**
     * Store a newly created Grade in storage.
     * POST /grades
     *
     * @param CreateGradeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGradeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Grade $grade */
        $grade = Grade::create($input);

        return $this->sendResponse($grade->toArray(), 'Grade saved successfully');
    }

    /**
     * Display the specified Grade.
     * GET|HEAD /grades/{id}
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
            return $this->sendError('Grade not found');
        }

        return $this->sendResponse($grade->toArray(), 'Grade retrieved successfully');
    }

    /**
     * Update the specified Grade in storage.
     * PUT/PATCH /grades/{id}
     *
     * @param int $id
     * @param UpdateGradeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradeAPIRequest $request)
    {
        /** @var Grade $grade */
        $grade = Grade::find($id);

        if (empty($grade)) {
            return $this->sendError('Grade not found');
        }

        $grade->fill($request->all());
        $grade->save();

        return $this->sendResponse($grade->toArray(), 'Grade updated successfully');
    }

    /**
     * Remove the specified Grade from storage.
     * DELETE /grades/{id}
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
            return $this->sendError('Grade not found');
        }

        $grade->delete();

        return $this->sendSuccess('Grade deleted successfully');
    }
}
