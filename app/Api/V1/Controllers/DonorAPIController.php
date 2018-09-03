<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateDonorAPIRequest;
use App\Http\Requests\API\UpdateDonorAPIRequest;
use App\Models\Donor;
use App\Repositories\DonorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class DonorController
 * @package App\Api\V1\Controllers
 */

class DonorAPIController extends AppBaseController
{
    /** @var  DonorRepository */
    private $donorRepository;

    public function __construct(DonorRepository $donorRepo)
    {
        $this->donorRepository = $donorRepo;
    }

    /**
     * Display a listing of the Donor.
     * GET|HEAD /donors
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->donorRepository->pushCriteria(new RequestCriteria($request));
        $this->donorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $donors = $this->donorRepository->all();

        return $this->sendResponse($donors->toArray(), 'Donors retrieved successfully');
    }

    /**
     * Store a newly created Donor in storage.
     * POST /donors
     *
     * @param CreateDonorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDonorAPIRequest $request)
    {
        $input = $request->all();

        $donors = $this->donorRepository->create($input);

        return $this->sendResponse($donors->toArray(), 'Donor saved successfully');
    }

    /**
     * Display the specified Donor.
     * GET|HEAD /donors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Donor $donor */
        $donor = $this->donorRepository->findWithoutFail($id);

        if (empty($donor)) {
            return $this->sendError('Donor not found');
        }

        return $this->sendResponse($donor->toArray(), 'Donor retrieved successfully');
    }

    /**
     * Update the specified Donor in storage.
     * PUT/PATCH /donors/{id}
     *
     * @param  int $id
     * @param UpdateDonorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Donor $donor */
        $donor = $this->donorRepository->findWithoutFail($id);

        if (empty($donor)) {
            return $this->sendError('Donor not found');
        }

        $donor = $this->donorRepository->update($input, $id);

        return $this->sendResponse($donor->toArray(), 'Donor updated successfully');
    }

    /**
     * Remove the specified Donor from storage.
     * DELETE /donors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Donor $donor */
        $donor = $this->donorRepository->findWithoutFail($id);

        if (empty($donor)) {
            return $this->sendError('Donor not found');
        }

        $donor->delete();

        return $this->sendResponse($id, 'Donor deleted successfully');
    }
}
