<?php

namespace App\Repositories;

use App\Models\OutputIndicator;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OutputIndicatorRepository
 * @package App\Repositories
 * @version August 7, 2018, 8:08 am UTC
 *
 * @method OutputIndicator findWithoutFail($id, $columns = ['*'])
 * @method OutputIndicator find($id, $columns = ['*'])
 * @method OutputIndicator first($columns = ['*'])
*/
class OutputIndicatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'output_id',
        'indicator_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OutputIndicator::class;
    }
}
