<?php

namespace App\Repositories;

use App\Models\Budget;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BudgetRepository
 * @package App\Repositories
 * @version August 24, 2018, 4:50 pm UTC
 *
 * @method Budget findWithoutFail($id, $columns = ['*'])
 * @method Budget find($id, $columns = ['*'])
 * @method Budget first($columns = ['*'])
*/
class BudgetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'amount',
        'currency_id',
        'donor_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Budget::class;
    }
}
