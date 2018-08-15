<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateOutcomeIndicatorAPIRequest;
use App\Http\Requests\API\UpdateOutcomeIndicatorAPIRequest;
use App\Http\Resources\IndicatorResource;
use App\Models\OutcomeIndicator;
use App\Repositories\OutcomeIndicatorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OutcomeIndicatorController
 * @package App\Api\V1\Controllers
 */

class OutcomeIndicatorAPIController extends AppBaseController
{
    /** @var  OutcomeIndicatorRepository */
    private $outcomeIndicatorRepository;

    public function __construct(OutcomeIndicatorRepository $outcomeIndicatorRepo)
    {
        $this->outcomeIndicatorRepository = $outcomeIndicatorRepo;
    }

    /**
     * Display a listing of the OutcomeIndicator.
     * GET|HEAD /outcomeIndicators
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->outcomeIndicatorRepository->pushCriteria(new RequestCriteria($request));
        $this->outcomeIndicatorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $outcomeIndicators = $this->outcomeIndicatorRepository->all();

        return $this->sendResponse($outcomeIndicators->toArray(), 'Outcome Indicators retrieved successfully');
    }

    /**
     * Store a newly created OutcomeIndicator in storage.
     * POST /outcomeIndicators
     *
     * @param CreateOutcomeIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOutcomeIndicatorAPIRequest $request)
    {
        $input = $request->all();

        $outcomeIndicators = $this->outcomeIndicatorRepository->create($input);

        return $this->sendResponse($outcomeIndicators->toArray(), 'Outcome Indicator saved successfully');
    }

    /**
     * Display the specified OutcomeIndicator.
     * GET|HEAD /outcomeIndicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $indicators = OutcomeIndicator::join('outcomes', 'outcomes.id', '=', 'outcome_indicators.outcome_id')
            ->join('indicators', 'indicators.id','=','outcome_indicators.indicator_id')
            ->select(['indicators.id','indicators.name','indicators.description'])
            ->where('outcomes.id',$id)->get();

        return $this->sendResponse($indicators->toArray(), 'Outcome Indicators retrieved successfully');
    }

    /**
     * Update the specified OutcomeIndicator in storage.
     * PUT/PATCH /outcomeIndicators/{id}
     *
     * @param  int $id
     * @param UpdateOutcomeIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutcomeIndicatorAPIRequest $request)
    {
        $input = $request->all();

        /** @var OutcomeIndicator $outcomeIndicator */
        $outcomeIndicator = $this->outcomeIndicatorRepository->findWithoutFail($id);

        if (empty($outcomeIndicator)) {
            return $this->sendError('Outcome Indicator not found');
        }

        $outcomeIndicator = $this->outcomeIndicatorRepository->update($input, $id);

        return $this->sendResponse($outcomeIndicator->toArray(), 'OutcomeIndicator updated successfully');
    }

    /**
     * Remove the specified OutcomeIndicator from storage.
     * DELETE /outcomeIndicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OutcomeIndicator $outcomeIndicator */
        $outcomeIndicator = $this->outcomeIndicatorRepository->findWithoutFail($id);

        if (empty($outcomeIndicator)) {
            return $this->sendError('Outcome Indicator not found');
        }

        $outcomeIndicator->delete();

        return $this->sendResponse($id, 'Outcome Indicator deleted successfully');
    }

}
