<?php

namespace App\Repositories;

use App\Models\ExpenditureCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ExpenditureCategoryRepository
 * @package App\Repositories
 * @version August 25, 2018, 9:00 pm UTC
 *
 * @method ExpenditureCategory findWithoutFail($id, $columns = ['*'])
 * @method ExpenditureCategory find($id, $columns = ['*'])
 * @method ExpenditureCategory first($columns = ['*'])
*/
class ExpenditureCategoryRepository extends BaseRepository
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
        return ExpenditureCategory::class;
    }
}
