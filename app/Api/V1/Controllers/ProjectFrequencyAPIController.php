<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProjectFrequencyAPIRequest;
use App\Http\Requests\API\UpdateProjectFrequencyAPIRequest;
use App\Models\ProjectFrequency;
use App\Repositories\ProjectFrequencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProjectFrequencyController
 * @package App\Api\V1\Controllers
 */

class ProjectFrequencyAPIController extends AppBaseController
{
    /** @var  ProjectFrequencyRepository */
    private $projectFrequencyRepository;

    public function __construct(ProjectFrequencyRepository $projectFrequencyRepo)
    {
        $this->projectFrequencyRepository = $projectFrequencyRepo;
    }

    /**
     * Display a listing of the ProjectFrequency.
     * GET|HEAD /projectFrequencies
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->projectFrequencyRepository->pushCriteria(new RequestCriteria($request));
        $this->projectFrequencyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $projectFrequencies = $this->projectFrequencyRepository->all();

        return $this->sendResponse($projectFrequencies->toArray(), 'Project Frequencies retrieved successfully');
    }

    /**
     * Store a newly created ProjectFrequency in storage.
     * POST /projectFrequencies
     *
     * @param CreateProjectFrequencyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectFrequencyAPIRequest $request)
    {
        $input = $request->all();
        $projectFrequencies = array();
        foreach($request->frequency_id as $frequency) {
            $this->projectFrequencyRepository->create([
                'project_id' => $request->project_id,
                'frequency_id' => $frequency
            ]);
        }

        return $this->sendResponse($request->toArray(), 'Project Frequency saved successfully');
    }

    /**
     * Display the specified ProjectFrequency.
     * GET|HEAD /projectFrequencies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProjectFrequency $projectFrequency */
        $projectFrequency = $this->projectFrequencyRepository->findWithoutFail($id);

        if (empty($projectFrequency)) {
            return $this->sendError('Project Frequency not found');
        }

        return $this->sendResponse($projectFrequency->toArray(), 'Project Frequency retrieved successfully');
    }

    /**
     * Update the specified ProjectFrequency in storage.
     * PUT/PATCH /projectFrequencies/{id}
     *
     * @param  int $id
     * @param UpdateProjectFrequencyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectFrequencyAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectFrequency $projectFrequency */
        $projectFrequency = $this->projectFrequencyRepository->findWithoutFail($id);

        if (empty($projectFrequency)) {
            return $this->sendError('Project Frequency not found');
        }

        $projectFrequency = $this->projectFrequencyRepository->update($input, $id);

        return $this->sendResponse($projectFrequency->toArray(), 'ProjectFrequency updated successfully');
    }

    /**
     * Remove the specified ProjectFrequency from storage.
     * DELETE /projectFrequencies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProjectFrequency $projectFrequency */
        $projectFrequency = $this->projectFrequencyRepository->findWithoutFail($id);

        if (empty($projectFrequency)) {
            return $this->sendError('Project Frequency not found');
        }

        $projectFrequency->delete();

        return $this->sendResponse($id, 'Project Frequency deleted successfully');
    }
}
