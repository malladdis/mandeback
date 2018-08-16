<?php

namespace App\Repositories;

use App\Models\Indicator;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IndicatorRepository
 * @package App\Repositories
 * @version August 6, 2018, 5:28 pm UTC
 *
 * @method Indicator findWithoutFail($id, $columns = ['*'])
 * @method Indicator find($id, $columns = ['*'])
 * @method Indicator first($columns = ['*'])
*/
class IndicatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'type_id',
        'measuring_unit_id',
        'frequency_id',
        'baseline_value',
        'source',
        'target_value',
        'is_total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Indicator::class;
    }
}
