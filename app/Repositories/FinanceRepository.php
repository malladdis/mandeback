<?php

namespace App\Repositories;

use App\Models\Finance;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FinanceRepository
 * @package App\Repositories
 * @version August 28, 2018, 6:35 pm UTC
 *
 * @method Finance findWithoutFail($id, $columns = ['*'])
 * @method Finance find($id, $columns = ['*'])
 * @method Finance first($columns = ['*'])
*/
class FinanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'frequency_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Finance::class;
    }
}
