<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateIndicatorDisaggregationMethodAPIRequest;
use App\Http\Requests\API\UpdateIndicatorDisaggregationMethodAPIRequest;
use App\Models\IndicatorDisaggregationMethod;
use App\Repositories\IndicatorDisaggregationMethodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IndicatorDisaggregationMethodController
 * @package App\Api\V1\Controllers
 */

class IndicatorDisaggregationMethodAPIController extends AppBaseController
{
    /** @var  IndicatorDisaggregationMethodRepository */
    private $indicatorDisaggregationMethodRepository;

    public function __construct(IndicatorDisaggregationMethodRepository $indicatorDisaggregationMethodRepo)
    {
        $this->indicatorDisaggregationMethodRepository = $indicatorDisaggregationMethodRepo;
    }

    /**
     * Display a listing of the IndicatorDisaggregationMethod.
     * GET|HEAD /indicatorDisaggregationMethods
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->indicatorDisaggregationMethodRepository->pushCriteria(new RequestCriteria($request));
        $this->indicatorDisaggregationMethodRepository->pushCriteria(new LimitOffsetCriteria($request));
        $indicatorDisaggregationMethods = $this->indicatorDisaggregationMethodRepository->all();

        return $this->sendResponse($indicatorDisaggregationMethods->toArray(), 'Indicator Disaggregation Methods retrieved successfully');
    }

    /**
     * Store a newly created IndicatorDisaggregationMethod in storage.
     * POST /indicatorDisaggregationMethods
     *
     * @param CreateIndicatorDisaggregationMethodAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIndicatorDisaggregationMethodAPIRequest $request)
    {
        $input = $request->all();

        $indicatorDisaggregationMethods = $this->indicatorDisaggregationMethodRepository->create($input);

        return $this->sendResponse($indicatorDisaggregationMethods->toArray(), 'Indicator Disaggregation Method saved successfully');
    }

    /**
     * Display the specified IndicatorDisaggregationMethod.
     * GET|HEAD /indicatorDisaggregationMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var IndicatorDisaggregationMethod $indicatorDisaggregationMethod */
        $indicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepository->findWithoutFail($id);

        if (empty($indicatorDisaggregationMethod)) {
            return $this->sendError('Indicator Disaggregation Method not found');
        }

        return $this->sendResponse($indicatorDisaggregationMethod->toArray(), 'Indicator Disaggregation Method retrieved successfully');
    }

    /**
     * Update the specified IndicatorDisaggregationMethod in storage.
     * PUT/PATCH /indicatorDisaggregationMethods/{id}
     *
     * @param  int $id
     * @param UpdateIndicatorDisaggregationMethodAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndicatorDisaggregationMethodAPIRequest $request)
    {
        $input = $request->all();

        /** @var IndicatorDisaggregationMethod $indicatorDisaggregationMethod */
        $indicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepository->findWithoutFail($id);

        if (empty($indicatorDisaggregationMethod)) {
            return $this->sendError('Indicator Disaggregation Method not found');
        }

        $indicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepository->update($input, $id);

        return $this->sendResponse($indicatorDisaggregationMethod->toArray(), 'IndicatorDisaggregationMethod updated successfully');
    }

    /**
     * Remove the specified IndicatorDisaggregationMethod from storage.
     * DELETE /indicatorDisaggregationMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var IndicatorDisaggregationMethod $indicatorDisaggregationMethod */
        $indicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepository->findWithoutFail($id);

        if (empty($indicatorDisaggregationMethod)) {
            return $this->sendError('Indicator Disaggregation Method not found');
        }

        $indicatorDisaggregationMethod->delete();

        return $this->sendResponse($id, 'Indicator Disaggregation Method deleted successfully');
    }
}
