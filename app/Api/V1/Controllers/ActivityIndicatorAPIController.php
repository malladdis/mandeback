<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateActivityIndicatorAPIRequest;
use App\Http\Requests\API\UpdateActivityIndicatorAPIRequest;
use App\Models\ActivityIndicator;
use App\Repositories\ActivityIndicatorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActivityIndicatorController
 * @package App\Api\V1\Controllers
 */

class ActivityIndicatorAPIController extends AppBaseController
{
    /** @var  ActivityIndicatorRepository */
    private $activityIndicatorRepository;

    public function __construct(ActivityIndicatorRepository $activityIndicatorRepo)
    {
        $this->activityIndicatorRepository = $activityIndicatorRepo;
    }

    /**
     * Display a listing of the ActivityIndicator.
     * GET|HEAD /activityIndicators
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->activityIndicatorRepository->pushCriteria(new RequestCriteria($request));
        $this->activityIndicatorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $activityIndicators = $this->activityIndicatorRepository->all();

        return $this->sendResponse($activityIndicators->toArray(), 'Activity Indicators retrieved successfully');
    }

    /**
     * Store a newly created ActivityIndicator in storage.
     * POST /activityIndicators
     *
     * @param CreateActivityIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityIndicatorAPIRequest $request)
    {
        $input = $request->all();

        $activityIndicators = $this->activityIndicatorRepository->create($input);

        return $this->sendResponse($activityIndicators->toArray(), 'Activity Indicator saved successfully');
    }

    /**
     * Display the specified ActivityIndicator.
     * GET|HEAD /activityIndicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ActivityIndicator $activityIndicator */
        $activityIndicator = $this->activityIndicatorRepository->findWithoutFail($id);

        if (empty($activityIndicator)) {
            return $this->sendError('Activity Indicator not found');
        }

        return $this->sendResponse($activityIndicator->toArray(), 'Activity Indicator retrieved successfully');
    }

    /**
     * Update the specified ActivityIndicator in storage.
     * PUT/PATCH /activityIndicators/{id}
     *
     * @param  int $id
     * @param UpdateActivityIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityIndicatorAPIRequest $request)
    {
        $input = $request->all();

        /** @var ActivityIndicator $activityIndicator */
        $activityIndicator = $this->activityIndicatorRepository->findWithoutFail($id);

        if (empty($activityIndicator)) {
            return $this->sendError('Activity Indicator not found');
        }

        $activityIndicator = $this->activityIndicatorRepository->update($input, $id);

        return $this->sendResponse($activityIndicator->toArray(), 'ActivityIndicator updated successfully');
    }

    /**
     * Remove the specified ActivityIndicator from storage.
     * DELETE /activityIndicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ActivityIndicator $activityIndicator */
        $activityIndicator = $this->activityIndicatorRepository->findWithoutFail($id);

        if (empty($activityIndicator)) {
            return $this->sendError('Activity Indicator not found');
        }

        $activityIndicator->delete();

        return $this->sendResponse($id, 'Activity Indicator deleted successfully');
    }
}
