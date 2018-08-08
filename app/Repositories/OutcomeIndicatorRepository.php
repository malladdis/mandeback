<?php

namespace App\Repositories;

use App\Models\OutcomeIndicator;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OutcomeIndicatorRepository
 * @package App\Repositories
 * @version August 6, 2018, 5:36 pm UTC
 *
 * @method OutcomeIndicator findWithoutFail($id, $columns = ['*'])
 * @method OutcomeIndicator find($id, $columns = ['*'])
 * @method OutcomeIndicator first($columns = ['*'])
*/
class OutcomeIndicatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'outcome_id',
        'indicator_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OutcomeIndicator::class;
    }
}
