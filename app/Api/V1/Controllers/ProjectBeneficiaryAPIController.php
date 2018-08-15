<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProjectBeneficiaryAPIRequest;
use App\Http\Requests\API\UpdateProjectBeneficiaryAPIRequest;
use App\Models\ProjectBeneficiary;
use App\Repositories\ProjectBeneficiaryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProjectBeneficiaryController
 * @package App\Api\V1\Controllers
 */

class ProjectBeneficiaryAPIController extends AppBaseController
{
    /** @var  ProjectBeneficiaryRepository */
    private $projectBeneficiaryRepository;

    public function __construct(ProjectBeneficiaryRepository $projectBeneficiaryRepo)
    {
        $this->projectBeneficiaryRepository = $projectBeneficiaryRepo;
    }

    /**
     * Display a listing of the ProjectBeneficiary.
     * GET|HEAD /projectBeneficiaries
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->projectBeneficiaryRepository->pushCriteria(new RequestCriteria($request));
        $this->projectBeneficiaryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $projectBeneficiaries = $this->projectBeneficiaryRepository->all();

        return $this->sendResponse($projectBeneficiaries->toArray(), 'Project Beneficiaries retrieved successfully');
    }

    /**
     * Store a newly created ProjectBeneficiary in storage.
     * POST /projectBeneficiaries
     *
     * @param CreateProjectBeneficiaryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectBeneficiaryAPIRequest $request)
    {
        $input = $request->all();

        foreach($request->beneficiary_id as $beneficiary) {
            $this->projectBeneficiaryRepository->create([
                'project_id' => $request->project_id,
                'beneficiary_id' => $beneficiary
            ]);
        }

        return $this->sendResponse($request->toArray(), 'Project Beneficiary saved successfully');
    }

    /**
     * Display the specified ProjectBeneficiary.
     * GET|HEAD /projectBeneficiaries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProjectBeneficiary $projectBeneficiary */
        $projectBeneficiary = $this->projectBeneficiaryRepository->findWithoutFail($id);

        if (empty($projectBeneficiary)) {
            return $this->sendError('Project Beneficiary not found');
        }

        return $this->sendResponse($projectBeneficiary->toArray(), 'Project Beneficiary retrieved successfully');
    }

    /**
     * Update the specified ProjectBeneficiary in storage.
     * PUT/PATCH /projectBeneficiaries/{id}
     *
     * @param  int $id
     * @param UpdateProjectBeneficiaryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectBeneficiaryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectBeneficiary $projectBeneficiary */
        $projectBeneficiary = $this->projectBeneficiaryRepository->findWithoutFail($id);

        if (empty($projectBeneficiary)) {
            return $this->sendError('Project Beneficiary not found');
        }

        $projectBeneficiary = $this->projectBeneficiaryRepository->update($input, $id);

        return $this->sendResponse($projectBeneficiary->toArray(), 'ProjectBeneficiary updated successfully');
    }

    /**
     * Remove the specified ProjectBeneficiary from storage.
     * DELETE /projectBeneficiaries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProjectBeneficiary $projectBeneficiary */
        $projectBeneficiary = $this->projectBeneficiaryRepository->findWithoutFail($id);

        if (empty($projectBeneficiary)) {
            return $this->sendError('Project Beneficiary not found');
        }

        $projectBeneficiary->delete();

        return $this->sendResponse($id, 'Project Beneficiary deleted successfully');
    }
}
