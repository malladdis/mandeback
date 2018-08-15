<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateActivityBudgetAPIRequest;
use App\Http\Requests\API\UpdateActivityBudgetAPIRequest;
use App\Models\ActivityBudget;
use App\Repositories\ActivityBudgetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActivityBudgetController
 * @package App\Api\V1\Controllers
 */

class ActivityBudgetAPIController extends AppBaseController
{
    /** @var  ActivityBudgetRepository */
    private $activityBudgetRepository;

    public function __construct(ActivityBudgetRepository $activityBudgetRepo)
    {
        $this->activityBudgetRepository = $activityBudgetRepo;
    }

    /**
     * Display a listing of the ActivityBudget.
     * GET|HEAD /activityBudgets
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->activityBudgetRepository->pushCriteria(new RequestCriteria($request));
        $this->activityBudgetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $activityBudgets = $this->activityBudgetRepository->all();

        return $this->sendResponse($activityBudgets->toArray(), 'Activity Budgets retrieved successfully');
    }

    /**
     * Store a newly created ActivityBudget in storage.
     * POST /activityBudgets
     *
     * @param CreateActivityBudgetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityBudgetAPIRequest $request)
    {
        $input = $request->all();

        $activityBudgets = $this->activityBudgetRepository->create($input);

        return $this->sendResponse($activityBudgets->toArray(), 'Activity Budget saved successfully');
    }

    /**
     * Display the specified ActivityBudget.
     * GET|HEAD /activityBudgets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ActivityBudget $activityBudget */
        $activityBudget = $this->activityBudgetRepository->findWithoutFail($id);

        if (empty($activityBudget)) {
            return $this->sendError('Activity Budget not found');
        }

        return $this->sendResponse($activityBudget->toArray(), 'Activity Budget retrieved successfully');
    }

    /**
     * Update the specified ActivityBudget in storage.
     * PUT/PATCH /activityBudgets/{id}
     *
     * @param  int $id
     * @param UpdateActivityBudgetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityBudgetAPIRequest $request)
    {
        $input = $request->all();

        /** @var ActivityBudget $activityBudget */
        $activityBudget = $this->activityBudgetRepository->findWithoutFail($id);

        if (empty($activityBudget)) {
            return $this->sendError('Activity Budget not found');
        }

        $activityBudget = $this->activityBudgetRepository->update($input, $id);

        return $this->sendResponse($activityBudget->toArray(), 'ActivityBudget updated successfully');
    }

    /**
     * Remove the specified ActivityBudget from storage.
     * DELETE /activityBudgets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ActivityBudget $activityBudget */
        $activityBudget = $this->activityBudgetRepository->findWithoutFail($id);

        if (empty($activityBudget)) {
            return $this->sendError('Activity Budget not found');
        }

        $activityBudget->delete();

        return $this->sendResponse($id, 'Activity Budget deleted successfully');
    }
}
