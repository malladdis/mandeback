<?php

namespace App\Repositories;

use App\Models\ActivityCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityCategoryRepository
 * @package App\Repositories
 * @version August 15, 2018, 7:21 pm UTC
 *
 * @method ActivityCategory findWithoutFail($id, $columns = ['*'])
 * @method ActivityCategory find($id, $columns = ['*'])
 * @method ActivityCategory first($columns = ['*'])
*/
class ActivityCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActivityCategory::class;
    }
}
