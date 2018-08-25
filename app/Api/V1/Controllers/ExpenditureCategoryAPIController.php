<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateExpenditureCategoryAPIRequest;
use App\Http\Requests\API\UpdateExpenditureCategoryAPIRequest;
use App\Models\ExpenditureCategory;
use App\Repositories\ExpenditureCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ExpenditureCategoryController
 * @package App\Api\V1\Controllers
 */

class ExpenditureCategoryAPIController extends AppBaseController
{
    /** @var  ExpenditureCategoryRepository */
    private $expenditureCategoryRepository;

    public function __construct(ExpenditureCategoryRepository $expenditureCategoryRepo)
    {
        $this->expenditureCategoryRepository = $expenditureCategoryRepo;
    }

    /**
     * Display a listing of the ExpenditureCategory.
     * GET|HEAD /expenditureCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->expenditureCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->expenditureCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $expenditureCategories = $this->expenditureCategoryRepository->with(['expenditures'])->get();

        return $this->sendResponse($expenditureCategories->toArray(), 'Expenditure Categories retrieved successfully');
    }

    /**
     * Store a newly created ExpenditureCategory in storage.
     * POST /expenditureCategories
     *
     * @param CreateExpenditureCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExpenditureCategoryAPIRequest $request)
    {
        $input = $request->all();

        $expenditureCategories = $this->expenditureCategoryRepository->create($input);

        return $this->sendResponse($expenditureCategories->toArray(), 'Expenditure Category saved successfully');
    }

    /**
     * Display the specified ExpenditureCategory.
     * GET|HEAD /expenditureCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ExpenditureCategory $expenditureCategory */
        $expenditureCategory = $this->expenditureCategoryRepository->findWithoutFail($id);

        if (empty($expenditureCategory)) {
            return $this->sendError('Expenditure Category not found');
        }

        return $this->sendResponse($expenditureCategory->toArray(), 'Expenditure Category retrieved successfully');
    }

    /**
     * Update the specified ExpenditureCategory in storage.
     * PUT/PATCH /expenditureCategories/{id}
     *
     * @param  int $id
     * @param UpdateExpenditureCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpenditureCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ExpenditureCategory $expenditureCategory */
        $expenditureCategory = $this->expenditureCategoryRepository->findWithoutFail($id);

        if (empty($expenditureCategory)) {
            return $this->sendError('Expenditure Category not found');
        }

        $expenditureCategory = $this->expenditureCategoryRepository->update($input, $id);

        return $this->sendResponse($expenditureCategory->toArray(), 'ExpenditureCategory updated successfully');
    }

    /**
     * Remove the specified ExpenditureCategory from storage.
     * DELETE /expenditureCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ExpenditureCategory $expenditureCategory */
        $expenditureCategory = $this->expenditureCategoryRepository->findWithoutFail($id);

        if (empty($expenditureCategory)) {
            return $this->sendError('Expenditure Category not found');
        }

        $expenditureCategory->delete();

        return $this->sendResponse($id, 'Expenditure Category deleted successfully');
    }
}
