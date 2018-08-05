<?php

namespace App\Repositories;

use App\Models\ProjectImplementer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectImplementerRepository
 * @package App\Repositories
 * @version August 3, 2018, 8:41 am UTC
 *
 * @method ProjectImplementer findWithoutFail($id, $columns = ['*'])
 * @method ProjectImplementer find($id, $columns = ['*'])
 * @method ProjectImplementer first($columns = ['*'])
*/
class ProjectImplementerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'implementer_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectImplementer::class;
    }
}
