<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateMonthlyExpenditureAPIRequest;
use App\Http\Requests\API\UpdateMonthlyExpenditureAPIRequest;
use App\Models\MonthlyExpenditure;
use App\Repositories\MonthlyExpenditureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MonthlyExpenditureController
 * @package App\Api\V1\Controllers
 */

class MonthlyExpenditureAPIController extends AppBaseController
{
    /** @var  MonthlyExpenditureRepository */
    private $monthlyExpenditureRepository;

    public function __construct(MonthlyExpenditureRepository $monthlyExpenditureRepo)
    {
        $this->monthlyExpenditureRepository = $monthlyExpenditureRepo;
    }

    /**
     * Display a listing of the MonthlyExpenditure.
     * GET|HEAD /monthlyExpenditures
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->monthlyExpenditureRepository->pushCriteria(new RequestCriteria($request));
        $this->monthlyExpenditureRepository->pushCriteria(new LimitOffsetCriteria($request));
        $monthlyExpenditures = $this->monthlyExpenditureRepository->all();

        return $this->sendResponse($monthlyExpenditures->toArray(), 'Monthly Expenditures retrieved successfully');
    }

    /**
     * Store a newly created MonthlyExpenditure in storage.
     * POST /monthlyExpenditures
     *
     * @param CreateMonthlyExpenditureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMonthlyExpenditureAPIRequest $request)
    {
        $input = $request->all();

        $monthlyExpenditures = $this->monthlyExpenditureRepository->create($input);

        return $this->sendResponse($monthlyExpenditures->toArray(), 'Monthly Expenditure saved successfully');
    }

    /**
     * Display the specified MonthlyExpenditure.
     * GET|HEAD /monthlyExpenditures/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MonthlyExpenditure $monthlyExpenditure */
        $monthlyExpenditure = $this->monthlyExpenditureRepository->findWithoutFail($id);

        if (empty($monthlyExpenditure)) {
            return $this->sendError('Monthly Expenditure not found');
        }

        return $this->sendResponse($monthlyExpenditure->toArray(), 'Monthly Expenditure retrieved successfully');
    }

    /**
     * Update the specified MonthlyExpenditure in storage.
     * PUT/PATCH /monthlyExpenditures/{id}
     *
     * @param  int $id
     * @param UpdateMonthlyExpenditureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonthlyExpenditureAPIRequest $request)
    {
        $input = $request->all();

        /** @var MonthlyExpenditure $monthlyExpenditure */
        $monthlyExpenditure = $this->monthlyExpenditureRepository->findWithoutFail($id);

        if (empty($monthlyExpenditure)) {
            return $this->sendError('Monthly Expenditure not found');
        }

        $monthlyExpenditure = $this->monthlyExpenditureRepository->update($input, $id);

        return $this->sendResponse($monthlyExpenditure->toArray(), 'MonthlyExpenditure updated successfully');
    }

    /**
     * Remove the specified MonthlyExpenditure from storage.
     * DELETE /monthlyExpenditures/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MonthlyExpenditure $monthlyExpenditure */
        $monthlyExpenditure = $this->monthlyExpenditureRepository->findWithoutFail($id);

        if (empty($monthlyExpenditure)) {
            return $this->sendError('Monthly Expenditure not found');
        }

        $monthlyExpenditure->delete();

        return $this->sendResponse($id, 'Monthly Expenditure deleted successfully');
    }
}
