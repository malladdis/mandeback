<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProgramDetailAPIRequest;
use App\Http\Requests\API\UpdateProgramDetailAPIRequest;
use App\Models\ProgramDetail;
use App\Repositories\ProgramDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProgramDetailController
 * @package App\Api\V1\Controllers
 */

class ProgramDetailAPIController extends AppBaseController
{
    /** @var  ProgramDetailRepository */
    private $programDetailRepository;

    public function __construct(ProgramDetailRepository $programDetailRepo)
    {
        $this->programDetailRepository = $programDetailRepo;
    }

    /**
     * Display a listing of the ProgramDetail.
     * GET|HEAD /programDetails
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->programDetailRepository->pushCriteria(new RequestCriteria($request));
        $this->programDetailRepository->pushCriteria(new LimitOffsetCriteria($request));
        $programDetails = $this->programDetailRepository->all();

        return $this->sendResponse($programDetails->toArray(), 'Program Details retrieved successfully');
    }

    /**
     * Store a newly created ProgramDetail in storage.
     * POST /programDetails
     *
     * @param CreateProgramDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramDetailAPIRequest $request)
    {
        $input = $request->all();

        $programDetails = $this->programDetailRepository->create($input);

        return $this->sendResponse($programDetails->toArray(), 'Program Detail saved successfully');
    }

    /**
     * Display the specified ProgramDetail.
     * GET|HEAD /programDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProgramDetail $programDetail */
        $programDetail = $this->programDetailRepository->findWithoutFail($id);

        if (empty($programDetail)) {
            return $this->sendError('Program Detail not found');
        }

        return $this->sendResponse($programDetail->toArray(), 'Program Detail retrieved successfully');
    }

    /**
     * Update the specified ProgramDetail in storage.
     * PUT/PATCH /programDetails/{id}
     *
     * @param  int $id
     * @param UpdateProgramDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProgramDetail $programDetail */
        $programDetail = $this->programDetailRepository->findWithoutFail($id);

        if (empty($programDetail)) {
            return $this->sendError('Program Detail not found');
        }

        $programDetail = $this->programDetailRepository->update($input, $id);

        return $this->sendResponse($programDetail->toArray(), 'ProgramDetail updated successfully');
    }

    /**
     * Remove the specified ProgramDetail from storage.
     * DELETE /programDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProgramDetail $programDetail */
        $programDetail = $this->programDetailRepository->findWithoutFail($id);

        if (empty($programDetail)) {
            return $this->sendError('Program Detail not found');
        }

        $programDetail->delete();

        return $this->sendResponse($id, 'Program Detail deleted successfully');
    }
}
