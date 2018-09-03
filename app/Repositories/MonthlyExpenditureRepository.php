<?php

namespace App\Repositories;

use App\Models\MonthlyExpenditure;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MonthlyExpenditureRepository
 * @package App\Repositories
 * @version August 28, 2018, 3:48 pm UTC
 *
 * @method MonthlyExpenditure findWithoutFail($id, $columns = ['*'])
 * @method MonthlyExpenditure find($id, $columns = ['*'])
 * @method MonthlyExpenditure first($columns = ['*'])
*/
class MonthlyExpenditureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'finance_plan_id',
        'expenditure_id',
        'starting_month',
        'values'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MonthlyExpenditure::class;
    }
}
