<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateFrequencyAPIRequest;
use App\Http\Requests\API\UpdateFrequencyAPIRequest;
use App\Models\Frequency;
use App\Repositories\FrequencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FrequencyController
 * @package App\Http\Controllers\API
 */

class FrequencyAPIController extends AppBaseController
{
    /** @var  FrequencyRepository */
    private $frequencyRepository;

    public function __construct(FrequencyRepository $frequencyRepo)
    {
        $this->frequencyRepository = $frequencyRepo;
    }

    /**
     * Display a listing of the Frequency.
     * GET|HEAD /frequencies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->frequencyRepository->pushCriteria(new RequestCriteria($request));
        $this->frequencyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $frequencies = $this->frequencyRepository->all();

        return $this->sendResponse($frequencies->toArray(), 'Frequencies retrieved successfully');
    }

    /**
     * Store a newly created Frequency in storage.
     * POST /frequencies
     *
     * @param CreateFrequencyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFrequencyAPIRequest $request)
    {
        $input = $request->all();

        $frequencies = $this->frequencyRepository->create($input);

        return $this->sendResponse($frequencies->toArray(), 'Frequency saved successfully');
    }

    /**
     * Display the specified Frequency.
     * GET|HEAD /frequencies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Frequency $frequency */
        $frequency = $this->frequencyRepository->findWithoutFail($id);

        if (empty($frequency)) {
            return $this->sendError('Frequency not found');
        }

        return $this->sendResponse($frequency->toArray(), 'Frequency retrieved successfully');
    }

    /**
     * Update the specified Frequency in storage.
     * PUT/PATCH /frequencies/{id}
     *
     * @param  int $id
     * @param UpdateFrequencyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFrequencyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Frequency $frequency */
        $frequency = $this->frequencyRepository->findWithoutFail($id);

        if (empty($frequency)) {
            return $this->sendError('Frequency not found');
        }

        $frequency = $this->frequencyRepository->update($input, $id);

        return $this->sendResponse($frequency->toArray(), 'Frequency updated successfully');
    }

    /**
     * Remove the specified Frequency from storage.
     * DELETE /frequencies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Frequency $frequency */
        $frequency = $this->frequencyRepository->findWithoutFail($id);

        if (empty($frequency)) {
            return $this->sendError('Frequency not found');
        }

        $frequency->delete();

        return $this->sendResponse($id, 'Frequency deleted successfully');
    }
}
