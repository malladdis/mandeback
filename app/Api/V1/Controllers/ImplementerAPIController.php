<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateImplementerAPIRequest;
use App\Http\Requests\API\UpdateImplementerAPIRequest;
use App\Models\Implementer;
use App\Repositories\ImplementerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ImplementerController
 * @package App\Api\V1\Controllers
 */

class ImplementerAPIController extends AppBaseController
{
    /** @var  ImplementerRepository */
    private $implementerRepository;

    public function __construct(ImplementerRepository $implementerRepo)
    {
        $this->implementerRepository = $implementerRepo;
    }

    /**
     * Display a listing of the Implementer.
     * GET|HEAD /implementers
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->implementerRepository->pushCriteria(new RequestCriteria($request));
        $this->implementerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $implementers = $this->implementerRepository->all();

        return $this->sendResponse($implementers->toArray(), 'Implementers retrieved successfully');
    }

    /**
     * Store a newly created Implementer in storage.
     * POST /implementers
     *
     * @param CreateImplementerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateImplementerAPIRequest $request)
    {
        $input = $request->all();

        $implementers = $this->implementerRepository->create($input);

        return $this->sendResponse($implementers->toArray(), 'Implementer saved successfully');
    }

    /**
     * Display the specified Implementer.
     * GET|HEAD /implementers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Implementer $implementer */
        $implementer = $this->implementerRepository->findWithoutFail($id);

        if (empty($implementer)) {
            return $this->sendError('Implementer not found');
        }

        return $this->sendResponse($implementer->toArray(), 'Implementer retrieved successfully');
    }

    /**
     * Update the specified Implementer in storage.
     * PUT/PATCH /implementers/{id}
     *
     * @param  int $id
     * @param UpdateImplementerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImplementerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Implementer $implementer */
        $implementer = $this->implementerRepository->findWithoutFail($id);

        if (empty($implementer)) {
            return $this->sendError('Implementer not found');
        }

        $implementer = $this->implementerRepository->update($input, $id);

        return $this->sendResponse($implementer->toArray(), 'Implementer updated successfully');
    }

    /**
     * Remove the specified Implementer from storage.
     * DELETE /implementers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Implementer $implementer */
        $implementer = $this->implementerRepository->findWithoutFail($id);

        if (empty($implementer)) {
            return $this->sendError('Implementer not found');
        }

        $implementer->delete();

        return $this->sendResponse($id, 'Implementer deleted successfully');
    }
}
