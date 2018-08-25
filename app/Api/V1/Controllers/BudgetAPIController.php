<?php
namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateBudgetAPIRequest;
use App\Http\Requests\API\UpdateBudgetAPIRequest;
use App\Models\Budget;
use App\Repositories\BudgetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BudgetController
 * @package App\Api\V1\Controllers
 */

class BudgetAPIController extends AppBaseController
{
    /** @var  BudgetRepository */
    private $budgetRepository;

    public function __construct(BudgetRepository $budgetRepo)
    {
        $this->budgetRepository = $budgetRepo;
    }

    /**
     * Display a listing of the Budget.
     * GET|HEAD /budgets
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->budgetRepository->pushCriteria(new RequestCriteria($request));
        $this->budgetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $budgets = $this->budgetRepository->all();

        return $this->sendResponse($budgets->toArray(), 'Budgets retrieved successfully');
    }

    /**
     * Store a newly created Budget in storage.
     * POST /budgets
     *
     * @param CreateBudgetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBudgetAPIRequest $request)
    {
        $input = $request->all();

        $budgets = $this->budgetRepository->create($input);

        return $this->sendResponse($budgets->toArray(), 'Budget saved successfully');
    }

    /**
     * Display the specified Budget.
     * GET|HEAD /budgets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Budget $budget */
        $budget = $this->budgetRepository->findWithoutFail($id);

        if (empty($budget)) {
            return $this->sendError('Budget not found');
        }

        return $this->sendResponse($budget->toArray(), 'Budget retrieved successfully');
    }

    /**
     * Update the specified Budget in storage.
     * PUT/PATCH /budgets/{id}
     *
     * @param  int $id
     * @param UpdateBudgetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBudgetAPIRequest $request)
    {
        $input = $request->all();

        /** @var Budget $budget */
        $budget = $this->budgetRepository->findWithoutFail($id);

        if (empty($budget)) {
            return $this->sendError('Budget not found');
        }

        $budget = $this->budgetRepository->update($input, $id);

        return $this->sendResponse($budget->toArray(), 'Budget updated successfully');
    }

    /**
     * Remove the specified Budget from storage.
     * DELETE /budgets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Budget $budget */
        $budget = $this->budgetRepository->findWithoutFail($id);

        if (empty($budget)) {
            return $this->sendError('Budget not found');
        }

        $budget->delete();

        return $this->sendResponse($id, 'Budget deleted successfully');
    }
}
