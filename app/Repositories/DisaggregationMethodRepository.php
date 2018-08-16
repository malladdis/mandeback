<?php

namespace App\Repositories;

use App\Models\DisaggregationMethod;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DisaggregationMethodRepository
 * @package App\Repositories
 * @version August 16, 2018, 2:26 pm UTC
 *
 * @method DisaggregationMethod findWithoutFail($id, $columns = ['*'])
 * @method DisaggregationMethod find($id, $columns = ['*'])
 * @method DisaggregationMethod first($columns = ['*'])
*/
class DisaggregationMethodRepository extends BaseRepository
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
        return DisaggregationMethod::class;
    }
}
