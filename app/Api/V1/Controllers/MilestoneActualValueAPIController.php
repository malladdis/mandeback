<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateMilestoneActualValueAPIRequest;
use App\Http\Requests\API\UpdateMilestoneActualValueAPIRequest;
use App\Models\MilestoneActualValue;
use App\Repositories\MilestoneActualValueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MilestoneActualValueController
 * @package App\Http\Controllers\API
 */

class MilestoneActualValueAPIController extends AppBaseController
{
    /** @var  MilestoneActualValueRepository */
    private $milestoneActualValueRepository;

    public function __construct(MilestoneActualValueRepository $milestoneActualValueRepo)
    {
        $this->milestoneActualValueRepository = $milestoneActualValueRepo;
    }

    /**
     * Display a listing of the MilestoneActualValue.
     * GET|HEAD /milestoneActualValues
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->milestoneActualValueRepository->pushCriteria(new RequestCriteria($request));
        $this->milestoneActualValueRepository->pushCriteria(new LimitOffsetCriteria($request));
        $milestoneActualValues = $this->milestoneActualValueRepository->all();

        return $this->sendResponse($milestoneActualValues->toArray(), 'Milestone Actual Values retrieved successfully');
    }

    /**
     * Store a newly created MilestoneActualValue in storage.
     * POST /milestoneActualValues
     *
     * @param CreateMilestoneActualValueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMilestoneActualValueAPIRequest $request)
    {
        $input = $request->all();

        $milestoneActualValues = $this->milestoneActualValueRepository->create($input);

        return $this->sendResponse($milestoneActualValues->toArray(), 'Milestone Actual Value saved successfully');
    }

    /**
     * Display the specified MilestoneActualValue.
     * GET|HEAD /milestoneActualValues/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MilestoneActualValue $milestoneActualValue */
        $milestoneActualValue = $this->milestoneActualValueRepository->findWithoutFail($id);

        if (empty($milestoneActualValue)) {
            return $this->sendError('Milestone Actual Value not found');
        }

        return $this->sendResponse($milestoneActualValue->toArray(), 'Milestone Actual Value retrieved successfully');
    }

    /**
     * Update the specified MilestoneActualValue in storage.
     * PUT/PATCH /milestoneActualValues/{id}
     *
     * @param  int $id
     * @param UpdateMilestoneActualValueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMilestoneActualValueAPIRequest $request)
    {
        $input = $request->all();

        /** @var MilestoneActualValue $milestoneActualValue */
        $milestoneActualValue = $this->milestoneActualValueRepository->findWithoutFail($id);

        if (empty($milestoneActualValue)) {
            return $this->sendError('Milestone Actual Value not found');
        }

        $milestoneActualValue = $this->milestoneActualValueRepository->update($input, $id);

        return $this->sendResponse($milestoneActualValue->toArray(), 'MilestoneActualValue updated successfully');
    }

    /**
     * Remove the specified MilestoneActualValue from storage.
     * DELETE /milestoneActualValues/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MilestoneActualValue $milestoneActualValue */
        $milestoneActualValue = $this->milestoneActualValueRepository->findWithoutFail($id);

        if (empty($milestoneActualValue)) {
            return $this->sendError('Milestone Actual Value not found');
        }

        $milestoneActualValue->delete();

        return $this->sendResponse($id, 'Milestone Actual Value deleted successfully');
    }
}
