<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProjectDetailAPIRequest;
use App\Http\Requests\API\UpdateProjectDetailAPIRequest;
use App\Models\ProjectDetail;
use App\Repositories\ProjectDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProjectDetailController
 * @package App\Http\Controllers\API
 */

class ProjectDetailAPIController extends AppBaseController
{
    /** @var  ProjectDetailRepository */
    private $projectDetailRepository;

    public function __construct(ProjectDetailRepository $projectDetailRepo)
    {
        $this->projectDetailRepository = $projectDetailRepo;
    }

    /**
     * Display a listing of the ProjectDetail.
     * GET|HEAD /projectDetails
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->projectDetailRepository->pushCriteria(new RequestCriteria($request));
        $this->projectDetailRepository->pushCriteria(new LimitOffsetCriteria($request));
        $projectDetails = $this->projectDetailRepository->all();

        return $this->sendResponse($projectDetails->toArray(), 'Project Details retrieved successfully');
    }

    /**
     * Store a newly created ProjectDetail in storage.
     * POST /projectDetails
     *
     * @param CreateProjectDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectDetailAPIRequest $request)
    {
        $input = $request->all();

        $projectDetails = $this->projectDetailRepository->create($input);

        return $this->sendResponse($projectDetails->toArray(), 'Project Detail saved successfully');
    }

    /**
     * Display the specified ProjectDetail.
     * GET|HEAD /projectDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProjectDetail $projectDetail */
        $projectDetail = $this->projectDetailRepository->findWithoutFail($id);

        if (empty($projectDetail)) {
            return $this->sendError('Project Detail not found');
        }

        return $this->sendResponse($projectDetail->toArray(), 'Project Detail retrieved successfully');
    }

    /**
     * Update the specified ProjectDetail in storage.
     * PUT/PATCH /projectDetails/{id}
     *
     * @param  int $id
     * @param UpdateProjectDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectDetail $projectDetail */
        $projectDetail = $this->projectDetailRepository->findWithoutFail($id);

        if (empty($projectDetail)) {
            return $this->sendError('Project Detail not found');
        }

        $projectDetail = $this->projectDetailRepository->update($input, $id);

        return $this->sendResponse($projectDetail->toArray(), 'ProjectDetail updated successfully');
    }

    /**
     * Remove the specified ProjectDetail from storage.
     * DELETE /projectDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProjectDetail $projectDetail */
        $projectDetail = $this->projectDetailRepository->findWithoutFail($id);

        if (empty($projectDetail)) {
            return $this->sendError('Project Detail not found');
        }

        $projectDetail->delete();

        return $this->sendResponse($id, 'Project Detail deleted successfully');
    }
}
