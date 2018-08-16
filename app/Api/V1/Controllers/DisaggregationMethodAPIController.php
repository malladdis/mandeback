<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateDisaggregationMethodAPIRequest;
use App\Http\Requests\API\UpdateDisaggregationMethodAPIRequest;
use App\Models\DisaggregationMethod;
use App\Repositories\DisaggregationMethodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DisaggregationMethodController
 * @package App\Api\V1\Controllers
 */

class DisaggregationMethodAPIController extends AppBaseController
{
    /** @var  DisaggregationMethodRepository */
    private $disaggregationMethodRepository;

    public function __construct(DisaggregationMethodRepository $disaggregationMethodRepo)
    {
        $this->disaggregationMethodRepository = $disaggregationMethodRepo;
    }

    /**
     * Display a listing of the DisaggregationMethod.
     * GET|HEAD /disaggregationMethods
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->disaggregationMethodRepository->pushCriteria(new RequestCriteria($request));
        $this->disaggregationMethodRepository->pushCriteria(new LimitOffsetCriteria($request));
        $disaggregationMethods = $this->disaggregationMethodRepository->all();

        return $this->sendResponse($disaggregationMethods->toArray(), 'Disaggregation Methods retrieved successfully');
    }

    /**
     * Store a newly created DisaggregationMethod in storage.
     * POST /disaggregationMethods
     *
     * @param CreateDisaggregationMethodAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDisaggregationMethodAPIRequest $request)
    {
        $input = $request->all();

        $disaggregationMethods = $this->disaggregationMethodRepository->create($input);

        return $this->sendResponse($disaggregationMethods->toArray(), 'Disaggregation Method saved successfully');
    }

    /**
     * Display the specified DisaggregationMethod.
     * GET|HEAD /disaggregationMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DisaggregationMethod $disaggregationMethod */
        $disaggregationMethod = $this->disaggregationMethodRepository->findWithoutFail($id);

        if (empty($disaggregationMethod)) {
            return $this->sendError('Disaggregation Method not found');
        }

        return $this->sendResponse($disaggregationMethod->toArray(), 'Disaggregation Method retrieved successfully');
    }

    /**
     * Update the specified DisaggregationMethod in storage.
     * PUT/PATCH /disaggregationMethods/{id}
     *
     * @param  int $id
     * @param UpdateDisaggregationMethodAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDisaggregationMethodAPIRequest $request)
    {
        $input = $request->all();

        /** @var DisaggregationMethod $disaggregationMethod */
        $disaggregationMethod = $this->disaggregationMethodRepository->findWithoutFail($id);

        if (empty($disaggregationMethod)) {
            return $this->sendError('Disaggregation Method not found');
        }

        $disaggregationMethod = $this->disaggregationMethodRepository->update($input, $id);

        return $this->sendResponse($disaggregationMethod->toArray(), 'DisaggregationMethod updated successfully');
    }

    /**
     * Remove the specified DisaggregationMethod from storage.
     * DELETE /disaggregationMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DisaggregationMethod $disaggregationMethod */
        $disaggregationMethod = $this->disaggregationMethodRepository->findWithoutFail($id);

        if (empty($disaggregationMethod)) {
            return $this->sendError('Disaggregation Method not found');
        }

        $disaggregationMethod->delete();

        return $this->sendResponse($id, 'Disaggregation Method deleted successfully');
    }
}
