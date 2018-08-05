<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProgramAPIRequest;
use App\Http\Requests\API\UpdateProgramAPIRequest;
use App\Models\Program;
use App\Repositories\ProgramRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;

/**
 * Class ProgramController
 * @package App\Http\Controllers\API
 */

class ProgramAPIController extends AppBaseController
{
    /** @var  ProgramRepository */
    private $programRepository;

    public function __construct(ProgramRepository $programRepo)
    {
        $this->programRepository = $programRepo;
    }

    /**
     * Display a listing of the Program.
     * GET|HEAD /programs
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->programRepository->pushCriteria(new RequestCriteria($request));
        $this->programRepository->pushCriteria(new LimitOffsetCriteria($request));
        $programs = $this->programRepository->with(['program_detail'])->get();

        return $this->sendResponse($programs->toArray(), 'Programs retrieved successfully');
    }

    /**
     * Store a newly created Program in storage.
     * POST /programs
     *
     * @param CreateProgramAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramAPIRequest $request)
    {
        $input = $request->all();

        $programs = $this->programRepository->create($input);

        return $this->sendResponse($programs->toArray(), 'Program saved successfully');
    }

    /**
     * Display the specified Program.
     * GET|HEAD /programs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Program $program */
        $program = $this->programRepository->with(['program_detail'])->get();

        if (empty($program)) {
            return $this->sendError('Program not found');
        }

        return $this->sendResponse($program->toArray(), 'Program retrieved successfully');
    }

    /**
     * Update the specified Program in storage.
     * PUT/PATCH /programs/{id}
     *
     * @param  int $id
     * @param UpdateProgramAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramAPIRequest $request)
    {
        $input = $request->all();

        /** @var Program $program */
        $program = $this->programRepository->findWithoutFail($id);

        if (empty($program)) {
            return $this->sendError('Program not found');
        }

        $program = $this->programRepository->update($input, $id);

        return $this->sendResponse($program->toArray(), 'Program updated successfully');
    }

    /**
     * Remove the specified Program from storage.
     * DELETE /programs/{id}
     *
     * @param  int $id
     *
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Program $program */
        $program = $this->programRepository->findWithoutFail($id);

        if (empty($program)) {
            return $this->sendError('Program not found');
        }

        $program->delete();

        return $this->sendResponse($id, 'Program deleted successfully');
    }
}
