<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateMeasuringUnitAPIRequest;
use App\Http\Requests\API\UpdateMeasuringUnitAPIRequest;
use App\Models\MeasuringUnit;
use App\Repositories\MeasuringUnitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MeasuringUnitController
 * @package App\Api\V1\Controllers
 */

class MeasuringUnitAPIController extends AppBaseController
{
    /** @var  MeasuringUnitRepository */
    private $measuringUnitRepository;

    public function __construct(MeasuringUnitRepository $measuringUnitRepo)
    {
        $this->measuringUnitRepository = $measuringUnitRepo;
    }

    /**
     * Display a listing of the MeasuringUnit.
     * GET|HEAD /measuringUnits
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->measuringUnitRepository->pushCriteria(new RequestCriteria($request));
        $this->measuringUnitRepository->pushCriteria(new LimitOffsetCriteria($request));
        $measuringUnits = $this->measuringUnitRepository->all();

        return $this->sendResponse($measuringUnits->toArray(), 'Measuring Units retrieved successfully');
    }

    /**
     * Store a newly created MeasuringUnit in storage.
     * POST /measuringUnits
     *
     * @param CreateMeasuringUnitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMeasuringUnitAPIRequest $request)
    {
        $input = $request->all();

        $measuringUnits = $this->measuringUnitRepository->create($input);

        return $this->sendResponse($measuringUnits->toArray(), 'Measuring Unit saved successfully');
    }

    /**
     * Display the specified MeasuringUnit.
     * GET|HEAD /measuringUnits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MeasuringUnit $measuringUnit */
        $measuringUnit = $this->measuringUnitRepository->findWithoutFail($id);

        if (empty($measuringUnit)) {
            return $this->sendError('Measuring Unit not found');
        }

        return $this->sendResponse($measuringUnit->toArray(), 'Measuring Unit retrieved successfully');
    }

    /**
     * Update the specified MeasuringUnit in storage.
     * PUT/PATCH /measuringUnits/{id}
     *
     * @param  int $id
     * @param UpdateMeasuringUnitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeasuringUnitAPIRequest $request)
    {
        $input = $request->all();

        /** @var MeasuringUnit $measuringUnit */
        $measuringUnit = $this->measuringUnitRepository->findWithoutFail($id);

        if (empty($measuringUnit)) {
            return $this->sendError('Measuring Unit not found');
        }

        $measuringUnit = $this->measuringUnitRepository->update($input, $id);

        return $this->sendResponse($measuringUnit->toArray(), 'MeasuringUnit updated successfully');
    }

    /**
     * Remove the specified MeasuringUnit from storage.
     * DELETE /measuringUnits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MeasuringUnit $measuringUnit */
        $measuringUnit = $this->measuringUnitRepository->findWithoutFail($id);

        if (empty($measuringUnit)) {
            return $this->sendError('Measuring Unit not found');
        }

        $measuringUnit->delete();

        return $this->sendResponse($id, 'Measuring Unit deleted successfully');
    }
}
