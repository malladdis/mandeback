<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateMilestoneAPIRequest;
use App\Http\Requests\API\UpdateMilestoneAPIRequest;
use App\Models\Milestone;
use App\Repositories\MilestoneRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MilestoneController
 * @package App\Http\Controllers\API
 */

class MilestoneAPIController extends AppBaseController
{
    /** @var  MilestoneRepository */
    private $milestoneRepository;

    public function __construct(MilestoneRepository $milestoneRepo)
    {
        $this->milestoneRepository = $milestoneRepo;
    }

    /**
     * Display a listing of the Milestone.
     * GET|HEAD /milestones
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->milestoneRepository->pushCriteria(new RequestCriteria($request));
        $this->milestoneRepository->pushCriteria(new LimitOffsetCriteria($request));
        $milestones = $this->milestoneRepository->all();

        return $this->sendResponse($milestones->toArray(), 'Milestones retrieved successfully');
    }

    /**
     * Store a newly created Milestone in storage.
     * POST /milestones
     *
     * @param CreateMilestoneAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMilestoneAPIRequest $request)
    {
        $input = $request->all();

        $milestones = $this->milestoneRepository->create($input);

        return $this->sendResponse($milestones->toArray(), 'Milestone saved successfully');
    }

    /**
     * Display the specified Milestone.
     * GET|HEAD /milestones/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Milestone $milestone */
        $milestone = $this->milestoneRepository->findWithoutFail($id);

        if (empty($milestone)) {
            return $this->sendError('Milestone not found');
        }

        return $this->sendResponse($milestone->toArray(), 'Milestone retrieved successfully');
    }

    /**
     * Update the specified Milestone in storage.
     * PUT/PATCH /milestones/{id}
     *
     * @param  int $id
     * @param UpdateMilestoneAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMilestoneAPIRequest $request)
    {
        $input = $request->all();

        /** @var Milestone $milestone */
        $milestone = $this->milestoneRepository->findWithoutFail($id);

        if (empty($milestone)) {
            return $this->sendError('Milestone not found');
        }

        $milestone = $this->milestoneRepository->update($input, $id);

        return $this->sendResponse($milestone->toArray(), 'Milestone updated successfully');
    }

    /**
     * Remove the specified Milestone from storage.
     * DELETE /milestones/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Milestone $milestone */
        $milestone = $this->milestoneRepository->findWithoutFail($id);

        if (empty($milestone)) {
            return $this->sendError('Milestone not found');
        }

        $milestone->delete();

        return $this->sendResponse($id, 'Milestone deleted successfully');
    }
}
