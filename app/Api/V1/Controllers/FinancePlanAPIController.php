<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateFinancePlanAPIRequest;
use App\Http\Requests\API\UpdateFinancePlanAPIRequest;
use App\Models\FinancePlan;
use App\Repositories\FinancePlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FinancePlanController
 * @package App\Api\V1\Controllers
 */

class FinancePlanAPIController extends AppBaseController
{
    /** @var  FinancePlanRepository */
    private $financePlanRepository;

    public function __construct(FinancePlanRepository $financePlanRepo)
    {
        $this->financePlanRepository = $financePlanRepo;
    }

    /**
     * Display a listing of the FinancePlan.
     * GET|HEAD /financePlans
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->financePlanRepository->pushCriteria(new RequestCriteria($request));
        $this->financePlanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $financePlans = $this->financePlanRepository->all();

        return $this->sendResponse($financePlans->toArray(), 'Finance Plans retrieved successfully');
    }

    /**
     * Store a newly created FinancePlan in storage.
     * POST /financePlans
     *
     * @param CreateFinancePlanAPIRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateFinancePlanAPIRequest $request)
    {
        $financePlans = [];
        foreach ($request->plans as $plan){
            $this->financePlanRepository->create([
                'finance_id' => $request->finance_id,
                'name' => $plan['name'],
                'value' => $plan['value'],
                'start' => $plan['start']
            ]);
        }
        return $this->sendResponse($financePlans, 'Finance Plans saved successfully');
    }

    /**
     * Display the specified FinancePlan.
     * GET|HEAD /financePlans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FinancePlan $financePlan */
        $financePlan = $this->financePlanRepository->findWithoutFail($id);

        if (empty($financePlan)) {
            return $this->sendError('Finance Plan not found');
        }

        return $this->sendResponse($financePlan->toArray(), 'Finance Plan retrieved successfully');
    }

    /**
     * Update the specified FinancePlan in storage.
     * PUT/PATCH /financePlans/{id}
     *
     * @param  int $id
     * @param UpdateFinancePlanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancePlanAPIRequest $request)
    {
        $input = $request->all();

        /** @var FinancePlan $financePlan */
        $financePlan = $this->financePlanRepository->findWithoutFail($id);

        if (empty($financePlan)) {
            return $this->sendError('Finance Plan not found');
        }

        $financePlan = $this->financePlanRepository->update($input, $id);

        return $this->sendResponse($financePlan->toArray(), 'FinancePlan updated successfully');
    }

    /**
     * Remove the specified FinancePlan from storage.
     * DELETE /financePlans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FinancePlan $financePlan */
        $financePlan = $this->financePlanRepository->findWithoutFail($id);

        if (empty($financePlan)) {
            return $this->sendError('Finance Plan not found');
        }

        $financePlan->delete();

        return $this->sendResponse($id, 'Finance Plan deleted successfully');
    }
}
