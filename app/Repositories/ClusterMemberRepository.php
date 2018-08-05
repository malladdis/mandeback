<?php

namespace App\Repositories;

use App\Models\ClusterMember;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClusterMemberRepository
 * @package App\Repositories
 * @version July 31, 2018, 4:07 pm UTC
 *
 * @method ClusterMember findWithoutFail($id, $columns = ['*'])
 * @method ClusterMember find($id, $columns = ['*'])
 * @method ClusterMember first($columns = ['*'])
*/
class ClusterMemberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kebele_id',
        'cluster_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClusterMember::class;
    }
}
