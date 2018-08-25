<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateExpenditureAPIRequest;
use App\Http\Requests\API\UpdateExpenditureAPIRequest;
use App\Models\Expenditure;
use App\Repositories\ExpenditureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ExpenditureController
 * @package  App\Api\V1\Controllers
 */

class ExpenditureAPIController extends AppBaseController
{
    /** @var  ExpenditureRepository */
    private $expenditureRepository;

    public function __construct(ExpenditureRepository $expenditureRepo)
    {
        $this->expenditureRepository = $expenditureRepo;
    }

    /**
     * Display a listing of the Expenditure.
     * GET|HEAD /expenditures
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->expenditureRepository->pushCriteria(new RequestCriteria($request));
        $this->expenditureRepository->pushCriteria(new LimitOffsetCriteria($request));
        $expenditures = $this->expenditureRepository->all();

        return $this->sendResponse($expenditures->toArray(), 'Expenditures retrieved successfully');
    }

    /**
     * Store a newly created Expenditure in storage.
     * POST /expenditures
     *
     * @param CreateExpenditureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExpenditureAPIRequest $request)
    {
        $input = $request->all();

        $expenditures = $this->expenditureRepository->create($input);

        return $this->sendResponse($expenditures->toArray(), 'Expenditure saved successfully');
    }

    /**
     * Display the specified Expenditure.
     * GET|HEAD /expenditures/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Expenditure $expenditure */
        $expenditure = $this->expenditureRepository->findWithoutFail($id);

        if (empty($expenditure)) {
            return $this->sendError('Expenditure not found');
        }

        return $this->sendResponse($expenditure->toArray(), 'Expenditure retrieved successfully');
    }

    /**
     * Update the specified Expenditure in storage.
     * PUT/PATCH /expenditures/{id}
     *
     * @param  int $id
     * @param UpdateExpenditureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpenditureAPIRequest $request)
    {
        $input = $request->all();

        /** @var Expenditure $expenditure */
        $expenditure = $this->expenditureRepository->findWithoutFail($id);

        if (empty($expenditure)) {
            return $this->sendError('Expenditure not found');
        }

        $expenditure = $this->expenditureRepository->update($input, $id);

        return $this->sendResponse($expenditure->toArray(), 'Expenditure updated successfully');
    }

    /**
     * Remove the specified Expenditure from storage.
     * DELETE /expenditures/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Expenditure $expenditure */
        $expenditure = $this->expenditureRepository->findWithoutFail($id);

        if (empty($expenditure)) {
            return $this->sendError('Expenditure not found');
        }

        $expenditure->delete();

        return $this->sendResponse($id, 'Expenditure deleted successfully');
    }
}
