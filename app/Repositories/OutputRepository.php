<?php

namespace App\Repositories;

use App\Models\Output;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OutputRepository
 * @package App\Repositories
 * @version August 5, 2018, 6:56 pm UTC
 *
 * @method Output findWithoutFail($id, $columns = ['*'])
 * @method Output find($id, $columns = ['*'])
 * @method Output first($columns = ['*'])
*/
class OutputRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'type_id',
        'outcome_id',
        'parent_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Output::class;
    }
}
