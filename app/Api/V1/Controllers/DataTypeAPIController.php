<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateDataTypeAPIRequest;
use App\Http\Requests\API\UpdateDataTypeAPIRequest;
use App\Models\DataType;
use App\Repositories\DataTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DataTypeController
 * @package App\Api\V1\Controllers
 */

class DataTypeAPIController extends AppBaseController
{
    /** @var  DataTypeRepository */
    private $dataTypeRepository;

    public function __construct(DataTypeRepository $dataTypeRepo)
    {
        $this->dataTypeRepository = $dataTypeRepo;
    }

    /**
     * Display a listing of the DataType.
     * GET|HEAD /dataTypes
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->dataTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->dataTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataTypes = $this->dataTypeRepository->all();

        return $this->sendResponse($dataTypes->toArray(), 'Data Types retrieved successfully');
    }

    /**
     * Store a newly created DataType in storage.
     * POST /dataTypes
     *
     * @param CreateDataTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDataTypeAPIRequest $request)
    {
        $input = $request->all();

        $dataTypes = $this->dataTypeRepository->create($input);

        return $this->sendResponse($dataTypes->toArray(), 'Data Type saved successfully');
    }

    /**
     * Display the specified DataType.
     * GET|HEAD /dataTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataType $dataType */
        $dataType = $this->dataTypeRepository->findWithoutFail($id);

        if (empty($dataType)) {
            return $this->sendError('Data Type not found');
        }

        return $this->sendResponse($dataType->toArray(), 'Data Type retrieved successfully');
    }

    /**
     * Update the specified DataType in storage.
     * PUT/PATCH /dataTypes/{id}
     *
     * @param  int $id
     * @param UpdateDataTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var DataType $dataType */
        $dataType = $this->dataTypeRepository->findWithoutFail($id);

        if (empty($dataType)) {
            return $this->sendError('Data Type not found');
        }

        $dataType = $this->dataTypeRepository->update($input, $id);

        return $this->sendResponse($dataType->toArray(), 'DataType updated successfully');
    }

    /**
     * Remove the specified DataType from storage.
     * DELETE /dataTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataType $dataType */
        $dataType = $this->dataTypeRepository->findWithoutFail($id);

        if (empty($dataType)) {
            return $this->sendError('Data Type not found');
        }

        $dataType->delete();

        return $this->sendResponse($id, 'Data Type deleted successfully');
    }
}
