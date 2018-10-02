<?php

namespace App\Repositories;

use App\Models\FinancePlan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FinancePlanRepository
 * @package App\Repositories
 * @version August 28, 2018, 3:37 pm UTC
 *
 * @method FinancePlan findWithoutFail($id, $columns = ['*'])
 * @method FinancePlan find($id, $columns = ['*'])
 * @method FinancePlan first($columns = ['*'])
*/
class FinancePlanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'finance_id',
        'name',
        'value',
        'start'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FinancePlan::class;
    }
}
