<?php

namespace App\Repositories;

use App\Models\ProjectCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectCategoryRepository
 * @package App\Repositories
 * @version July 29, 2018, 3:35 pm UTC
 *
 * @method ProjectCategory findWithoutFail($id, $columns = ['*'])
 * @method ProjectCategory find($id, $columns = ['*'])
 * @method ProjectCategory first($columns = ['*'])
*/
class ProjectCategoryRepository extends BaseRepository
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
        return ProjectCategory::class;
    }
}
