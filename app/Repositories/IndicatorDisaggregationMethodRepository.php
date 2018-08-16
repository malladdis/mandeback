<?php

namespace App\Repositories;

use App\Models\IndicatorDisaggregationMethod;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IndicatorDisaggregationMethodRepository
 * @package App\Repositories
 * @version August 16, 2018, 2:27 pm UTC
 *
 * @method IndicatorDisaggregationMethod findWithoutFail($id, $columns = ['*'])
 * @method IndicatorDisaggregationMethod find($id, $columns = ['*'])
 * @method IndicatorDisaggregationMethod first($columns = ['*'])
*/
class IndicatorDisaggregationMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'indicator_id',
        'disaggregation_method_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return IndicatorDisaggregationMethod::class;
    }
}
