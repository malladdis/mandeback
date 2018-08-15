<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateOutcomeAPIRequest;
use App\Http\Requests\API\UpdateOutcomeAPIRequest;
use App\Http\Resources\OutcomeResource;
use App\Models\Outcome;
use App\Repositories\OutcomeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OutcomeController
 * @package App\Api\V1\Controllers
 */

class OutcomeAPIController extends AppBaseController
{
    /** @var  OutcomeRepository */
    private $outcomeRepository;

    public function __construct(OutcomeRepository $outcomeRepo)
    {
        $this->outcomeRepository = $outcomeRepo;
    }

    /**
     * Display a listing of the Outcome.
     * GET|HEAD /outcomes
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->outcomeRepository->pushCriteria(new RequestCriteria($request));
        $this->outcomeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $outcomes = $this->outcomeRepository->all();

        return $this->sendResponse($outcomes->toArray(), 'Outcomes retrieved successfully');
    }

    /**
     * Store a newly created Outcome in storage.
     * POST /outcomes
     *
     * @param CreateOutcomeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOutcomeAPIRequest $request)
    {
        $input = $request->all();

        $outcomes = $this->outcomeRepository->create($input);

        return $this->sendResponse($outcomes->toArray(), 'Outcome saved successfully');
    }

    /**
     * Display the specified Outcome.
     * GET|HEAD /outcomes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Outcome $outcome */
        $outcome = new OutcomeResource(Outcome::find($id));

        if (empty($outcome)) {
            return $this->sendError('Outcome not found');
        }

        return $this->sendResponse($outcome, 'Outcome retrieved successfully');
    }

    /**
     * Update the specified Outcome in storage.
     * PUT/PATCH /outcomes/{id}
     *
     * @param  int $id
     * @param UpdateOutcomeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutcomeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Outcome $outcome */
        $outcome = $this->outcomeRepository->findWithoutFail($id);

        if (empty($outcome)) {
            return $this->sendError('Outcome not found');
        }

        $outcome = $this->outcomeRepository->update($input, $id);

        return $this->sendResponse($outcome->toArray(), 'Outcome updated successfully');
    }

    /**
     * Remove the specified Outcome from storage.
     * DELETE /outcomes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Outcome $outcome */
        $outcome = $this->outcomeRepository->findWithoutFail($id);

        if (empty($outcome)) {
            return $this->sendError('Outcome not found');
        }

        $outcome->delete();

        return $this->sendResponse($id, 'Outcome deleted successfully');
    }
}
