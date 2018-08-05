<?php

namespace App\Repositories;

use App\Models\Cluster;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClusterRepository
 * @package App\Repositories
 * @version July 31, 2018, 4:04 pm UTC
 *
 * @method Cluster findWithoutFail($id, $columns = ['*'])
 * @method Cluster find($id, $columns = ['*'])
 * @method Cluster first($columns = ['*'])
*/
class ClusterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cluster::class;
    }
}
