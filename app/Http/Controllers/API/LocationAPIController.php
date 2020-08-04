<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLocationAPIRequest;
use App\Http\Requests\API\UpdateLocationAPIRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LocationController
 * @package App\Http\Controllers\API
 */

class LocationAPIController extends AppBaseController
{
    /**
     * Display a listing of the Location.
     * GET|HEAD /locations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Location::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $locations = $query->get();

        return $this->sendResponse($locations->toArray(), 'Locations retrieved successfully');
    }

    /**
     * Store a newly created Location in storage.
     * POST /locations
     *
     * @param CreateLocationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Location $location */
        $location = Location::create($input);

        return $this->sendResponse($location->toArray(), 'Location saved successfully');
    }

    /**
     * Display the specified Location.
     * GET|HEAD /locations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Location $location */
        $location = Location::find($id);

        if (empty($location)) {
            return $this->sendError('Location not found');
        }

        return $this->sendResponse($location->toArray(), 'Location retrieved successfully');
    }

    /**
     * Update the specified Location in storage.
     * PUT/PATCH /locations/{id}
     *
     * @param int $id
     * @param UpdateLocationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationAPIRequest $request)
    {
        /** @var Location $location */
        $location = Location::find($id);

        if (empty($location)) {
            return $this->sendError('Location not found');
        }

        $location->fill($request->all());
        $location->save();

        return $this->sendResponse($location->toArray(), 'Location updated successfully');
    }

    /**
     * Remove the specified Location from storage.
     * DELETE /locations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Location $location */
        $location = Location::find($id);

        if (empty($location)) {
            return $this->sendError('Location not found');
        }

        $location->delete();

        return $this->sendSuccess('Location deleted successfully');
    }
}
