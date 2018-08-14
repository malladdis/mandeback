<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateTimePlanAPIRequest;
use App\Http\Requests\API\UpdateTimePlanAPIRequest;
use App\Models\TimePlan;
use App\Repositories\TimePlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TimePlanController
 * @package App\Http\Controllers\API
 */

class TimePlanAPIController extends AppBaseController
{
    /** @var  TimePlanRepository */
    private $timePlanRepository;

    public function __construct(TimePlanRepository $timePlanRepo)
    {
        $this->timePlanRepository = $timePlanRepo;
    }

    /**
     * Display a listing of the TimePlan.
     * GET|HEAD /timePlans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->timePlanRepository->pushCriteria(new RequestCriteria($request));
        $this->timePlanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $timePlans = $this->timePlanRepository->all();

        return $this->sendResponse($timePlans->toArray(), 'Time Plans retrieved successfully');
    }

    /**
     * Store a newly created TimePlan in storage.
     * POST /timePlans
     *
     * @param CreateTimePlanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTimePlanAPIRequest $request)
    {
        $input = $request->all();

        $timePlans = $this->timePlanRepository->create($input);

        return $this->sendResponse($timePlans->toArray(), 'Time Plan saved successfully');
    }

    /**
     * Display the specified TimePlan.
     * GET|HEAD /timePlans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TimePlan $timePlan */
        $timePlan = $this->timePlanRepository->findWithoutFail($id);

        if (empty($timePlan)) {
            return $this->sendError('Time Plan not found');
        }

        return $this->sendResponse($timePlan->toArray(), 'Time Plan retrieved successfully');
    }

    /**
     * Update the specified TimePlan in storage.
     * PUT/PATCH /timePlans/{id}
     *
     * @param  int $id
     * @param UpdateTimePlanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTimePlanAPIRequest $request)
    {
        $input = $request->all();

        /** @var TimePlan $timePlan */
        $timePlan = $this->timePlanRepository->findWithoutFail($id);

        if (empty($timePlan)) {
            return $this->sendError('Time Plan not found');
        }

        $timePlan = $this->timePlanRepository->update($input, $id);

        return $this->sendResponse($timePlan->toArray(), 'TimePlan updated successfully');
    }

    /**
     * Remove the specified TimePlan from storage.
     * DELETE /timePlans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TimePlan $timePlan */
        $timePlan = $this->timePlanRepository->findWithoutFail($id);

        if (empty($timePlan)) {
            return $this->sendError('Time Plan not found');
        }

        $timePlan->delete();

        return $this->sendResponse($id, 'Time Plan deleted successfully');
    }
}
