<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateActivityCategoryAPIRequest;
use App\Http\Requests\API\UpdateActivityCategoryAPIRequest;
use App\Models\ActivityCategory;
use App\Repositories\ActivityCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActivityCategoryController
 * @package App\Api\V1\Controllers
 */

class ActivityCategoryAPIController extends AppBaseController
{
    /** @var  ActivityCategoryRepository */
    private $activityCategoryRepository;

    public function __construct(ActivityCategoryRepository $activityCategoryRepo)
    {
        $this->activityCategoryRepository = $activityCategoryRepo;
    }

    /**
     * Display a listing of the ActivityCategory.
     * GET|HEAD /activityCategories
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->activityCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->activityCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $activityCategories = $this->activityCategoryRepository->all();

        return $this->sendResponse($activityCategories->toArray(), 'Activity Categories retrieved successfully');
    }

    /**
     * Store a newly created ActivityCategory in storage.
     * POST /activityCategories
     *
     * @param CreateActivityCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityCategoryAPIRequest $request)
    {
        $input = $request->all();

        $activityCategories = $this->activityCategoryRepository->create($input);

        return $this->sendResponse($activityCategories->toArray(), 'Activity Category saved successfully');
    }

    /**
     * Display the specified ActivityCategory.
     * GET|HEAD /activityCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ActivityCategory $activityCategory */
        $activityCategory = $this->activityCategoryRepository->findWithoutFail($id);

        if (empty($activityCategory)) {
            return $this->sendError('Activity Category not found');
        }

        return $this->sendResponse($activityCategory->toArray(), 'Activity Category retrieved successfully');
    }

    /**
     * Update the specified ActivityCategory in storage.
     * PUT/PATCH /activityCategories/{id}
     *
     * @param  int $id
     * @param UpdateActivityCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ActivityCategory $activityCategory */
        $activityCategory = $this->activityCategoryRepository->findWithoutFail($id);

        if (empty($activityCategory)) {
            return $this->sendError('Activity Category not found');
        }

        $activityCategory = $this->activityCategoryRepository->update($input, $id);

        return $this->sendResponse($activityCategory->toArray(), 'ActivityCategory updated successfully');
    }

    /**
     * Remove the specified ActivityCategory from storage.
     * DELETE /activityCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ActivityCategory $activityCategory */
        $activityCategory = $this->activityCategoryRepository->findWithoutFail($id);

        if (empty($activityCategory)) {
            return $this->sendError('Activity Category not found');
        }

        $activityCategory->delete();

        return $this->sendResponse($id, 'Activity Category deleted successfully');
    }
}
