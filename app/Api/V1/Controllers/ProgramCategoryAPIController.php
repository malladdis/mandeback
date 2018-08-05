<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProgramCategoryAPIRequest;
use App\Http\Requests\API\UpdateProgramCategoryAPIRequest;
use App\Models\ProgramCategory;
use App\Repositories\ProgramCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;

/**
 * Class ProgramCategoryController
 * @package App\Api\V1\Controllers
 */

class ProgramCategoryAPIController extends AppBaseController
{
    /** @var  ProgramCategoryRepository */
    private $programCategoryRepository;

    public function __construct(ProgramCategoryRepository $programCategoryRepo)
    {
        $this->programCategoryRepository = $programCategoryRepo;
    }

    /**
     * Display a listing of the ProgramCategory.
     * GET|HEAD /programCategories
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->programCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->programCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $programCategories = $this->programCategoryRepository->with(['programs'])->get();

        return $this->sendResponse($programCategories->toArray(), 'Program Categories retrieved successfully');
    }

    /**
     * Store a newly created ProgramCategory in storage.
     * POST /programCategories
     *
     * @param CreateProgramCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramCategoryAPIRequest $request)
    {
        $input = $request->all();

        $programCategories = $this->programCategoryRepository->create($input);

        return $this->sendResponse($programCategories->toArray(), 'Program Category saved successfully');
    }

    /**
     * Display the specified ProgramCategory.
     * GET|HEAD /programCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProgramCategory $programCategory */
        $programCategory = $this->programCategoryRepository->findWithoutFail($id);

        if (empty($programCategory)) {
            return $this->sendError('Program Category not found');
        }

        return $this->sendResponse($programCategory->toArray(), 'Program Category retrieved successfully');
    }

    /**
     * Update the specified ProgramCategory in storage.
     * PUT/PATCH /programCategories/{id}
     *
     * @param  int $id
     * @param UpdateProgramCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProgramCategory $programCategory */
        $programCategory = $this->programCategoryRepository->findWithoutFail($id);

        if (empty($programCategory)) {
            return $this->sendError('Program Category not found');
        }

        $programCategory = $this->programCategoryRepository->update($input, $id);

        return $this->sendResponse($programCategory->toArray(), 'ProgramCategory updated successfully');
    }

    /**
     * Remove the specified ProgramCategory from storage.
     * DELETE /programCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProgramCategory $programCategory */
        $programCategory = $this->programCategoryRepository->findWithoutFail($id);

        if (empty($programCategory)) {
            return $this->sendError('Program Category not found');
        }

        $programCategory->delete();

        return $this->sendResponse($id, 'Program Category deleted successfully');
    }
}
