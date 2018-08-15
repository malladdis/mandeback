<?php

namespace App\Repositories;

use App\Models\ActivityBudget;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityBudgetRepository
 * @package App\Repositories
 * @version August 15, 2018, 7:20 pm UTC
 *
 * @method ActivityBudget findWithoutFail($id, $columns = ['*'])
 * @method ActivityBudget find($id, $columns = ['*'])
 * @method ActivityBudget first($columns = ['*'])
*/
class ActivityBudgetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'activity_id',
        'amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActivityBudget::class;
    }
}
