<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateClusterMemberAPIRequest;
use App\Http\Requests\API\UpdateClusterMemberAPIRequest;
use App\Models\ClusterMember;
use App\Repositories\ClusterMemberRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ClusterMemberController
 * @package App\Http\Controllers\API
 */

class ClusterMemberAPIController extends AppBaseController
{
    /** @var  ClusterMemberRepository */
    private $clusterMemberRepository;

    public function __construct(ClusterMemberRepository $clusterMemberRepo)
    {
        $this->clusterMemberRepository = $clusterMemberRepo;
    }

    /**
     * Display a listing of the ClusterMember.
     * GET|HEAD /clusterMembers
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->clusterMemberRepository->pushCriteria(new RequestCriteria($request));
        $this->clusterMemberRepository->pushCriteria(new LimitOffsetCriteria($request));
        $clusterMembers = $this->clusterMemberRepository->all();

        return $this->sendResponse($clusterMembers->toArray(), 'Cluster Members retrieved successfully');
    }

    /**
     * Store a newly created ClusterMember in storage.
     * POST /clusterMembers
     *
     * @param CreateClusterMemberAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClusterMemberAPIRequest $request)
    {
        $input = null;
        foreach ($request->kebele_id as $kebele) {
            $this->clusterMemberRepository->create([
                'cluster_id' => $request->cluster_id,
                'kebele_id' => $kebele
            ]);
        }



        return $this->sendResponse($request->toArray(), 'Cluster Member saved successfully');
    }

    /**
     * Display the specified ClusterMember.
     * GET|HEAD /clusterMembers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClusterMember $clusterMember */
        $clusterMember = $this->clusterMemberRepository->findWithoutFail($id);

        if (empty($clusterMember)) {
            return $this->sendError('Cluster Member not found');
        }

        return $this->sendResponse($clusterMember->toArray(), 'Cluster Member retrieved successfully');
    }

    /**
     * Update the specified ClusterMember in storage.
     * PUT/PATCH /clusterMembers/{id}
     *
     * @param  int $id
     * @param UpdateClusterMemberAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClusterMemberAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClusterMember $clusterMember */
        $clusterMember = $this->clusterMemberRepository->findWithoutFail($id);

        if (empty($clusterMember)) {
            return $this->sendError('Cluster Member not found');
        }

        $clusterMember = $this->clusterMemberRepository->update($input, $id);

        return $this->sendResponse($clusterMember->toArray(), 'ClusterMember updated successfully');
    }

    /**
     * Remove the specified ClusterMember from storage.
     * DELETE /clusterMembers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ClusterMember $clusterMember */
        $clusterMember = $this->clusterMemberRepository->findWithoutFail($id);

        if (empty($clusterMember)) {
            return $this->sendError('Cluster Member not found');
        }

        $clusterMember->delete();

        return $this->sendResponse($id, 'Cluster Member deleted successfully');
    }
}
