<?php

namespace App\Repositories;

use App\Models\ProgramDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProgramDetailRepository
 * @package App\Repositories
 * @version July 29, 2018, 11:10 pm UTC
 *
 * @method ProgramDetail findWithoutFail($id, $columns = ['*'])
 * @method ProgramDetail find($id, $columns = ['*'])
 * @method ProgramDetail first($columns = ['*'])
*/
class ProgramDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'program_id',
        'country',
        'budget',
        'starting_date',
        'ending_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProgramDetail::class;
    }
}
