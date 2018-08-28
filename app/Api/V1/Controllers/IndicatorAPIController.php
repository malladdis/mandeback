<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateIndicatorAPIRequest;
use App\Http\Requests\API\UpdateIndicatorAPIRequest;
use App\Models\Indicator;
use App\Repositories\IndicatorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IndicatorController
 * @package App\Api\V1\Controllers
 */

class IndicatorAPIController extends AppBaseController
{
    /** @var  IndicatorRepository */
    private $indicatorRepository;

    public function __construct(IndicatorRepository $indicatorRepo)
    {
        $this->indicatorRepository = $indicatorRepo;
    }

    /**
     * Display a listing of the Indicator.
     * GET|HEAD /indicators
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->indicatorRepository->pushCriteria(new RequestCriteria($request));
        $this->indicatorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $indicators = $this->indicatorRepository->all();

        return $this->sendResponse($indicators->toArray(), 'Indicators retrieved successfully');
    }

    /**
     * Store a newly created Indicator in storage.
     * POST /indicators
     *
     * @param CreateIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIndicatorAPIRequest $request)
    {
        $input = $request->all();

        $indicators = $this->indicatorRepository->create($input);

        return $this->sendResponse($indicators->toArray(), 'Indicator saved successfully');
    }

    /**
     * Display the specified Indicator.
     * GET|HEAD /indicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Indicator $indicator */
        $indicator = Indicator::where('id',$id)->with('type')->get();

        if (empty($indicator)) {
            return $this->sendError('Indicator not found');
        }

        return $this->sendResponse($indicator->toArray(), 'Indicator retrieved successfully');
    }

    /**
     * Update the specified Indicator in storage.
     * PUT/PATCH /indicators/{id}
     *
     * @param  int $id
     * @param UpdateIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndicatorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Indicator $indicator */
        $indicator = $this->indicatorRepository->findWithoutFail($id);

        if (empty($indicator)) {
            return $this->sendError('Indicator not found');
        }

        $indicator = $this->indicatorRepository->update($input, $id);

        return $this->sendResponse($indicator->toArray(), 'Indicator updated successfully');
    }

    /**
     * Remove the specified Indicator from storage.
     * DELETE /indicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Indicator $indicator */
        $indicator = $this->indicatorRepository->findWithoutFail($id);

        if (empty($indicator)) {
            return $this->sendError('Indicator not found');
        }

        $indicator->delete();

        return $this->sendResponse($id, 'Indicator deleted successfully');
    }
}
