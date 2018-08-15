<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateKebeleAPIRequest;
use App\Http\Requests\API\UpdateKebeleAPIRequest;
use App\Models\Kebele;
use App\Repositories\KebeleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KebeleController
 * @package App\Api\V1\Controllers
 */

class KebeleAPIController extends AppBaseController
{
    /** @var  KebeleRepository */
    private $kebeleRepository;

    public function __construct(KebeleRepository $kebeleRepo)
    {
        $this->kebeleRepository = $kebeleRepo;
    }

    /**
     * Display a listing of the Kebele.
     * GET|HEAD /kebeles
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->kebeleRepository->pushCriteria(new RequestCriteria($request));
        $this->kebeleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kebeles = $this->kebeleRepository->all();

        return $this->sendResponse($kebeles->toArray(), 'Kebeles retrieved successfully');
    }

    /**
     * Store a newly created Kebele in storage.
     * POST /kebeles
     *
     * @param CreateKebeleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKebeleAPIRequest $request)
    {
        $input = $request->all();

        $kebeles = $this->kebeleRepository->create($input);

        return $this->sendResponse($kebeles->toArray(), 'Kebele saved successfully');
    }

    /**
     * Display the specified Kebele.
     * GET|HEAD /kebeles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kebele $kebele */
        $kebele = $this->kebeleRepository->findWithoutFail($id);

        if (empty($kebele)) {
            return $this->sendError('Kebele not found');
        }

        return $this->sendResponse($kebele->toArray(), 'Kebele retrieved successfully');
    }

    /**
     * Update the specified Kebele in storage.
     * PUT/PATCH /kebeles/{id}
     *
     * @param  int $id
     * @param UpdateKebeleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKebeleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kebele $kebele */
        $kebele = $this->kebeleRepository->findWithoutFail($id);

        if (empty($kebele)) {
            return $this->sendError('Kebele not found');
        }

        $kebele = $this->kebeleRepository->update($input, $id);

        return $this->sendResponse($kebele->toArray(), 'Kebele updated successfully');
    }

    /**
     * Remove the specified Kebele from storage.
     * DELETE /kebeles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kebele $kebele */
        $kebele = $this->kebeleRepository->findWithoutFail($id);

        if (empty($kebele)) {
            return $this->sendError('Kebele not found');
        }

        $kebele->delete();

        return $this->sendResponse($id, 'Kebele deleted successfully');
    }
}
