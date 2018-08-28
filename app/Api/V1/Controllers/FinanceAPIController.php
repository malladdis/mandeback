<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateFinanceAPIRequest;
use App\Http\Requests\API\UpdateFinanceAPIRequest;
use App\Models\Finance;
use App\Repositories\FinanceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FinanceController
 * @package App\Api\V1\Controllers
 */

class FinanceAPIController extends AppBaseController
{
    /** @var  FinanceRepository */
    private $financeRepository;

    public function __construct(FinanceRepository $financeRepo)
    {
        $this->financeRepository = $financeRepo;
    }

    /**
     * Display a listing of the Finance.
     * GET|HEAD /finances
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->financeRepository->pushCriteria(new RequestCriteria($request));
        $this->financeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $finances = $this->financeRepository->all();

        return $this->sendResponse($finances->toArray(), 'Finances retrieved successfully');
    }

    /**
     * Store a newly created Finance in storage.
     * POST /finances
     *
     * @param CreateFinanceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFinanceAPIRequest $request)
    {
        $input = $request->all();

        $finances = $this->financeRepository->create($input);

        return $this->sendResponse($finances->toArray(), 'Finance saved successfully');
    }

    /**
     * Display the specified Finance.
     * GET|HEAD /finances/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Finance $finance */
        $finance = $this->financeRepository->findWithoutFail($id);

        if (empty($finance)) {
            return $this->sendError('Finance not found');
        }

        return $this->sendResponse($finance->toArray(), 'Finance retrieved successfully');
    }

    /**
     * Update the specified Finance in storage.
     * PUT/PATCH /finances/{id}
     *
     * @param  int $id
     * @param UpdateFinanceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinanceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Finance $finance */
        $finance = $this->financeRepository->findWithoutFail($id);

        if (empty($finance)) {
            return $this->sendError('Finance not found');
        }

        $finance = $this->financeRepository->update($input, $id);

        return $this->sendResponse($finance->toArray(), 'Finance updated successfully');
    }

    /**
     * Remove the specified Finance from storage.
     * DELETE /finances/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Finance $finance */
        $finance = $this->financeRepository->findWithoutFail($id);

        if (empty($finance)) {
            return $this->sendError('Finance not found');
        }

        $finance->delete();

        return $this->sendResponse($id, 'Finance deleted successfully');
    }
}
