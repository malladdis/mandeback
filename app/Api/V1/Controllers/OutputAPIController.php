<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateOutputAPIRequest;
use App\Http\Requests\API\UpdateOutputAPIRequest;
use App\Http\Resources\OutputResource;
use App\Models\Output;
use App\Repositories\OutputRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OutputController
 * @package App\Http\Controllers\API
 */

class OutputAPIController extends AppBaseController
{
    /** @var  OutputRepository */
    private $outputRepository;

    public function __construct(OutputRepository $outputRepo)
    {
        $this->outputRepository = $outputRepo;
    }

    /**
     * Display a listing of the Output.
     * GET|HEAD /outputs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->outputRepository->pushCriteria(new RequestCriteria($request));
        $this->outputRepository->pushCriteria(new LimitOffsetCriteria($request));
        $outputs = $this->outputRepository->all();

        return $this->sendResponse($outputs->toArray(), 'Outputs retrieved successfully');
    }

    /**
     * Store a newly created Output in storage.
     * POST /outputs
     *
     * @param CreateOutputAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOutputAPIRequest $request)
    {
        $input = $request->all();

        $outputs = $this->outputRepository->create($input);

        return $this->sendResponse($outputs->toArray(), 'Output saved successfully');
    }

    /**
     * Display the specified Output.
     * GET|HEAD /outputs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Output $output */
        $output = new OutputResource(Output::find($id));

        if (empty($output)) {
            return $this->sendError('Output not found');
        }

        return $this->sendResponse($output, 'Output retrieved successfully');
    }

    /**
     * Update the specified Output in storage.
     * PUT/PATCH /outputs/{id}
     *
     * @param  int $id
     * @param UpdateOutputAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutputAPIRequest $request)
    {
        $input = $request->all();

        /** @var Output $output */
        $output = $this->outputRepository->findWithoutFail($id);

        if (empty($output)) {
            return $this->sendError('Output not found');
        }

        $output = $this->outputRepository->update($input, $id);

        return $this->sendResponse($output->toArray(), 'Output updated successfully');
    }

    /**
     * Remove the specified Output from storage.
     * DELETE /outputs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Output $output */
        $output = $this->outputRepository->findWithoutFail($id);

        if (empty($output)) {
            return $this->sendError('Output not found');
        }

        $output->delete();

        return $this->sendResponse($id, 'Output deleted successfully');
    }
    public function getOutputsByOutcome($id) {
        $outputs = OutputResource::collection(Output::where('outcome_id', $id)->get());
        return $this->sendResponse($outputs, 'Outputs retrieved successfully');
    }
}
