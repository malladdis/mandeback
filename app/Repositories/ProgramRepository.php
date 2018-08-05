<?php

namespace App\Repositories;

use App\Models\Program;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProgramRepository
 * @package App\Repositories
 * @version July 29, 2018, 3:03 pm UTC
 *
 * @method Program findWithoutFail($id, $columns = ['*'])
 * @method Program find($id, $columns = ['*'])
 * @method Program first($columns = ['*'])
*/
class ProgramRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'program_category_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Program::class;
    }
}
