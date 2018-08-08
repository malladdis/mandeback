<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateOutputIndicatorAPIRequest;
use App\Http\Requests\API\UpdateOutputIndicatorAPIRequest;
use App\Models\OutputIndicator;
use App\Repositories\OutputIndicatorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OutputIndicatorController
 * @package App\Http\Controllers\API
 */

class OutputIndicatorAPIController extends AppBaseController
{
    /** @var  OutputIndicatorRepository */
    private $outputIndicatorRepository;

    public function __construct(OutputIndicatorRepository $outputIndicatorRepo)
    {
        $this->outputIndicatorRepository = $outputIndicatorRepo;
    }

    /**
     * Display a listing of the OutputIndicator.
     * GET|HEAD /outputIndicators
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->outputIndicatorRepository->pushCriteria(new RequestCriteria($request));
        $this->outputIndicatorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $outputIndicators = $this->outputIndicatorRepository->all();

        return $this->sendResponse($outputIndicators->toArray(), 'Output Indicators retrieved successfully');
    }

    /**
     * Store a newly created OutputIndicator in storage.
     * POST /outputIndicators
     *
     * @param CreateOutputIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOutputIndicatorAPIRequest $request)
    {
        $input = $request->all();

        $outputIndicators = $this->outputIndicatorRepository->create($input);

        return $this->sendResponse($outputIndicators->toArray(), 'Output Indicator saved successfully');
    }

    /**
     * Display the specified OutputIndicator.
     * GET|HEAD /outputIndicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OutputIndicator $outputIndicator */
        $indicators = OutputIndicator::join('outputs', 'outputs.id', '=', 'output_indicators.output_id')
            ->join('indicators', 'indicators.id','=','output_indicators.indicator_id')
            ->select(['indicators.id','indicators.name','indicators.description'])
            ->where('outputs.id',$id)->get();
        return $this->sendResponse($indicators->toArray(), 'Output Indicator retrieved successfully');
    }

    /**
     * Update the specified OutputIndicator in storage.
     * PUT/PATCH /outputIndicators/{id}
     *
     * @param  int $id
     * @param UpdateOutputIndicatorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutputIndicatorAPIRequest $request)
    {
        $input = $request->all();

        /** @var OutputIndicator $outputIndicator */
        $outputIndicator = $this->outputIndicatorRepository->findWithoutFail($id);

        if (empty($outputIndicator)) {
            return $this->sendError('Output Indicator not found');
        }

        $outputIndicator = $this->outputIndicatorRepository->update($input, $id);

        return $this->sendResponse($outputIndicator->toArray(), 'OutputIndicator updated successfully');
    }

    /**
     * Remove the specified OutputIndicator from storage.
     * DELETE /outputIndicators/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OutputIndicator $outputIndicator */
        $outputIndicator = $this->outputIndicatorRepository->findWithoutFail($id);

        if (empty($outputIndicator)) {
            return $this->sendError('Output Indicator not found');
        }

        $outputIndicator->delete();

        return $this->sendResponse($id, 'Output Indicator deleted successfully');
    }
}
