<?php

namespace App\Repositories;

use App\Models\ProjectDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectDetailRepository
 * @package App\Repositories
 * @version July 31, 2018, 3:54 pm UTC
 *
 * @method ProjectDetail findWithoutFail($id, $columns = ['*'])
 * @method ProjectDetail find($id, $columns = ['*'])
 * @method ProjectDetail first($columns = ['*'])
*/
class ProjectDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'cluster_id',
        'budget',
        'gloal',
        'objective',
        'mng_1',
        'mng_2',
        'starting_date',
        'ending_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectDetail::class;
    }
}
