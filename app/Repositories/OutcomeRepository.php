<?php

namespace App\Repositories;

use App\Models\Outcome;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OutcomeRepository
 * @package App\Repositories
 * @version August 3, 2018, 9:29 am UTC
 *
 * @method Outcome findWithoutFail($id, $columns = ['*'])
 * @method Outcome find($id, $columns = ['*'])
 * @method Outcome first($columns = ['*'])
*/
class OutcomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'type_id',
        'name',
        'description',
        'parent_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Outcome::class;
    }
}
