<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateBeneficiaryAPIRequest;
use App\Http\Requests\API\UpdateBeneficiaryAPIRequest;
use App\Models\Beneficiary;
use App\Repositories\BeneficiaryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BeneficiaryController
 * @package App\Http\Controllers\API
 */

class BeneficiaryAPIController extends AppBaseController
{
    /** @var  BeneficiaryRepository */
    private $beneficiaryRepository;

    public function __construct(BeneficiaryRepository $beneficiaryRepo)
    {
        $this->beneficiaryRepository = $beneficiaryRepo;
    }

    /**
     * Display a listing of the Beneficiary.
     * GET|HEAD /beneficiaries
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->beneficiaryRepository->pushCriteria(new RequestCriteria($request));
        $this->beneficiaryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $beneficiaries = $this->beneficiaryRepository->all();

        return $this->sendResponse($beneficiaries->toArray(), 'Beneficiaries retrieved successfully');
    }

    /**
     * Store a newly created Beneficiary in storage.
     * POST /beneficiaries
     *
     * @param CreateBeneficiaryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBeneficiaryAPIRequest $request)
    {
        $input = $request->all();

        $beneficiaries = $this->beneficiaryRepository->create($input);

        return $this->sendResponse($beneficiaries->toArray(), 'Beneficiary saved successfully');
    }

    /**
     * Display the specified Beneficiary.
     * GET|HEAD /beneficiaries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Beneficiary $beneficiary */
        $beneficiary = $this->beneficiaryRepository->findWithoutFail($id);

        if (empty($beneficiary)) {
            return $this->sendError('Beneficiary not found');
        }

        return $this->sendResponse($beneficiary->toArray(), 'Beneficiary retrieved successfully');
    }

    /**
     * Update the specified Beneficiary in storage.
     * PUT/PATCH /beneficiaries/{id}
     *
     * @param  int $id
     * @param UpdateBeneficiaryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBeneficiaryAPIRequest $request)
    {
        $input = $request->all();

        /** @var Beneficiary $beneficiary */
        $beneficiary = $this->beneficiaryRepository->findWithoutFail($id);

        if (empty($beneficiary)) {
            return $this->sendError('Beneficiary not found');
        }

        $beneficiary = $this->beneficiaryRepository->update($input, $id);

        return $this->sendResponse($beneficiary->toArray(), 'Beneficiary updated successfully');
    }

    /**
     * Remove the specified Beneficiary from storage.
     * DELETE /beneficiaries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Beneficiary $beneficiary */
        $beneficiary = $this->beneficiaryRepository->findWithoutFail($id);

        if (empty($beneficiary)) {
            return $this->sendError('Beneficiary not found');
        }

        $beneficiary->delete();

        return $this->sendResponse($id, 'Beneficiary deleted successfully');
    }
}
