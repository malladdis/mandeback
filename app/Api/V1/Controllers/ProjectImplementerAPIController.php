<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProjectImplementerAPIRequest;
use App\Http\Requests\API\UpdateProjectImplementerAPIRequest;
use App\Models\ProjectImplementer;
use App\Repositories\ProjectImplementerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProjectImplementerController
 * @package App\Http\Controllers\API
 */

class ProjectImplementerAPIController extends AppBaseController
{
    /** @var  ProjectImplementerRepository */
    private $projectImplementerRepository;

    public function __construct(ProjectImplementerRepository $projectImplementerRepo)
    {
        $this->projectImplementerRepository = $projectImplementerRepo;
    }

    /**
     * Display a listing of the ProjectImplementer.
     * GET|HEAD /projectImplementers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->projectImplementerRepository->pushCriteria(new RequestCriteria($request));
        $this->projectImplementerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $projectImplementers = $this->projectImplementerRepository->all();

        return $this->sendResponse($projectImplementers->toArray(), 'Project Implementers retrieved successfully');
    }

    /**
     * Store a newly created ProjectImplementer in storage.
     * POST /projectImplementers
     *
     * @param CreateProjectImplementerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectImplementerAPIRequest $request)
    {
        $input = $request->all();
        foreach($request->implementer_id as $implementer) {
            $this->projectImplementerRepository->create([
                'project_id' => $request->project_id,
                'implementer_id' => $implementer
            ]);
        }

        return $this->sendResponse($request->toArray(), 'Project Implementer saved successfully');
    }

    /**
     * Display the specified ProjectImplementer.
     * GET|HEAD /projectImplementers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProjectImplementer $projectImplementer */
        $projectImplementer = $this->projectImplementerRepository->findWithoutFail($id);

        if (empty($projectImplementer)) {
            return $this->sendError('Project Implementer not found');
        }

        return $this->sendResponse($projectImplementer->toArray(), 'Project Implementer retrieved successfully');
    }

    /**
     * Update the specified ProjectImplementer in storage.
     * PUT/PATCH /projectImplementers/{id}
     *
     * @param  int $id
     * @param UpdateProjectImplementerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectImplementerAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectImplementer $projectImplementer */
        $projectImplementer = $this->projectImplementerRepository->findWithoutFail($id);

        if (empty($projectImplementer)) {
            return $this->sendError('Project Implementer not found');
        }

        $projectImplementer = $this->projectImplementerRepository->update($input, $id);

        return $this->sendResponse($projectImplementer->toArray(), 'ProjectImplementer updated successfully');
    }

    /**
     * Remove the specified ProjectImplementer from storage.
     * DELETE /projectImplementers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProjectImplementer $projectImplementer */
        $projectImplementer = $this->projectImplementerRepository->findWithoutFail($id);

        if (empty($projectImplementer)) {
            return $this->sendError('Project Implementer not found');
        }

        $projectImplementer->delete();

        return $this->sendResponse($id, 'Project Implementer deleted successfully');
    }
}
