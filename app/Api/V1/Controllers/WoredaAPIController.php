<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateWoredaAPIRequest;
use App\Http\Requests\API\UpdateWoredaAPIRequest;
use App\Models\Woreda;
use App\Repositories\WoredaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WoredaController
 * @package App\Api\V1\Controllers
 */

class WoredaAPIController extends AppBaseController
{
    /** @var  WoredaRepository */
    private $woredaRepository;

    public function __construct(WoredaRepository $woredaRepo)
    {
        $this->woredaRepository = $woredaRepo;
    }

    /**
     * Display a listing of the Woreda.
     * GET|HEAD /woredas
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->woredaRepository->pushCriteria(new RequestCriteria($request));
        $this->woredaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $woredas = $this->woredaRepository->with(['kebeles'])->get();

        return $this->sendResponse($woredas->toArray(), 'Woredas retrieved successfully');
    }

    /**
     * Store a newly created Woreda in storage.
     * POST /woredas
     *
     * @param CreateWoredaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWoredaAPIRequest $request)
    {
        $input = $request->all();

        $woredas = $this->woredaRepository->create($input);

        return $this->sendResponse($woredas->toArray(), 'Woreda saved successfully');
    }

    /**
     * Display the specified Woreda.
     * GET|HEAD /woredas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Woreda $woreda */
        $woreda = $this->woredaRepository->findWithoutFail($id);

        if (empty($woreda)) {
            return $this->sendError('Woreda not found');
        }

        return $this->sendResponse($woreda->toArray(), 'Woreda retrieved successfully');
    }

    /**
     * Update the specified Woreda in storage.
     * PUT/PATCH /woredas/{id}
     *
     * @param  int $id
     * @param UpdateWoredaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWoredaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Woreda $woreda */
        $woreda = $this->woredaRepository->findWithoutFail($id);

        if (empty($woreda)) {
            return $this->sendError('Woreda not found');
        }

        $woreda = $this->woredaRepository->update($input, $id);

        return $this->sendResponse($woreda->toArray(), 'Woreda updated successfully');
    }

    /**
     * Remove the specified Woreda from storage.
     * DELETE /woredas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Woreda $woreda */
        $woreda = $this->woredaRepository->findWithoutFail($id);

        if (empty($woreda)) {
            return $this->sendError('Woreda not found');
        }

        $woreda->delete();

        return $this->sendResponse($id, 'Woreda deleted successfully');
    }
}
