<?php

namespace App\Repositories;

use App\Models\ProgramCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProgramCategoryRepository
 * @package App\Repositories
 * @version July 29, 2018, 2:38 pm UTC
 *
 * @method ProgramCategory findWithoutFail($id, $columns = ['*'])
 * @method ProgramCategory find($id, $columns = ['*'])
 * @method ProgramCategory first($columns = ['*'])
*/
class ProgramCategoryRepository extends BaseRepository
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
        return ProgramCategory::class;
    }

}
