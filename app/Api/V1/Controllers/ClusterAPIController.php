<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateClusterAPIRequest;
use App\Http\Requests\API\UpdateClusterAPIRequest;
use App\Models\Cluster;
use App\Repositories\ClusterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ClusterController
 * @package App\Http\Controllers\API
 */

class ClusterAPIController extends AppBaseController
{
    /** @var  ClusterRepository */
    private $clusterRepository;

    public function __construct(ClusterRepository $clusterRepo)
    {
        $this->clusterRepository = $clusterRepo;
    }

    /**
     * Display a listing of the Cluster.
     * GET|HEAD /clusters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clusterRepository->pushCriteria(new RequestCriteria($request));
        $this->clusterRepository->pushCriteria(new LimitOffsetCriteria($request));
        $clusters = $this->clusterRepository->with(['memebers'])->get();

        return $this->sendResponse($clusters->toArray(), 'Clusters retrieved successfully');
    }

    /**
     * Store a newly created Cluster in storage.
     * POST /clusters
     *
     * @param CreateClusterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClusterAPIRequest $request)
    {
        $input = $request->all();

        $clusters = $this->clusterRepository->create($input);

        return $this->sendResponse($clusters->toArray(), 'Cluster saved successfully');
    }

    /**
     * Display the specified Cluster.
     * GET|HEAD /clusters/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cluster $cluster */
        $cluster = $this->clusterRepository->findWithoutFail($id);

        if (empty($cluster)) {
            return $this->sendError('Cluster not found');
        }

        return $this->sendResponse($cluster->toArray(), 'Cluster retrieved successfully');
    }

    /**
     * Update the specified Cluster in storage.
     * PUT/PATCH /clusters/{id}
     *
     * @param  int $id
     * @param UpdateClusterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClusterAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cluster $cluster */
        $cluster = $this->clusterRepository->findWithoutFail($id);

        if (empty($cluster)) {
            return $this->sendError('Cluster not found');
        }

        $cluster = $this->clusterRepository->update($input, $id);

        return $this->sendResponse($cluster->toArray(), 'Cluster updated successfully');
    }

    /**
     * Remove the specified Cluster from storage.
     * DELETE /clusters/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cluster $cluster */
        $cluster = $this->clusterRepository->findWithoutFail($id);

        if (empty($cluster)) {
            return $this->sendError('Cluster not found');
        }

        $cluster->delete();

        return $this->sendResponse($id, 'Cluster deleted successfully');
    }
}
