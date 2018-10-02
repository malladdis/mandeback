<?php

namespace App\Repositories;

use App\Models\Expenditure;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ExpenditureRepository
 * @package App\Repositories
 * @version August 25, 2018, 9:02 pm UTC
 *
 * @method Expenditure findWithoutFail($id, $columns = ['*'])
 * @method Expenditure find($id, $columns = ['*'])
 * @method Expenditure first($columns = ['*'])
*/
class ExpenditureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'finance_plan_id',
        'expenditure_category_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Expenditure::class;
    }
}
