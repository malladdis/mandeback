<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateProjectCategoryAPIRequest;
use App\Http\Requests\API\UpdateProjectCategoryAPIRequest;
use App\Models\ProjectCategory;
use App\Repositories\ProjectCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProjectCategoryController
 * @package App\Api\V1\Controllers
 */

class ProjectCategoryAPIController extends AppBaseController
{
    /** @var  ProjectCategoryRepository */
    private $projectCategoryRepository;

    public function __construct(ProjectCategoryRepository $projectCategoryRepo)
    {
        $this->projectCategoryRepository = $projectCategoryRepo;
    }

    /**
     * Display a listing of the ProjectCategory.
     * GET|HEAD /projectCategories
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->projectCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->projectCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $projectCategories = $this->projectCategoryRepository->with(['projects'])->get();

        return $this->sendResponse($projectCategories->toArray(), 'Project Categories retrieved successfully');
    }

    /**
     * Store a newly created ProjectCategory in storage.
     * POST /projectCategories
     *
     * @param CreateProjectCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectCategoryAPIRequest $request)
    {
        $input = $request->all();

        $projectCategories = $this->projectCategoryRepository->create($input);

        return $this->sendResponse($projectCategories->toArray(), 'Project Category saved successfully');
    }

    /**
     * Display the specified ProjectCategory.
     * GET|HEAD /projectCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProjectCategory $projectCategory */
        $projectCategory = $this->projectCategoryRepository->findWithoutFail($id);

        if (empty($projectCategory)) {
            return $this->sendError('Project Category not found');
        }

        return $this->sendResponse($projectCategory->toArray(), 'Project Category retrieved successfully');
    }

    /**
     * Update the specified ProjectCategory in storage.
     * PUT/PATCH /projectCategories/{id}
     *
     * @param  int $id
     * @param UpdateProjectCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectCategory $projectCategory */
        $projectCategory = $this->projectCategoryRepository->findWithoutFail($id);

        if (empty($projectCategory)) {
            return $this->sendError('Project Category not found');
        }

        $projectCategory = $this->projectCategoryRepository->update($input, $id);

        return $this->sendResponse($projectCategory->toArray(), 'ProjectCategory updated successfully');
    }

    /**
     * Remove the specified ProjectCategory from storage.
     * DELETE /projectCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProjectCategory $projectCategory */
        $projectCategory = $this->projectCategoryRepository->findWithoutFail($id);

        if (empty($projectCategory)) {
            return $this->sendError('Project Category not found');
        }

        $projectCategory->delete();

        return $this->sendResponse($id, 'Project Category deleted successfully');
    }
}
