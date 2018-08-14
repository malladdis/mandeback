<?php

namespace App\Repositories;

use App\Models\TimePlan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TimePlanRepository
 * @package App\Repositories
 * @version August 10, 2018, 8:23 am UTC
 *
 * @method TimePlan findWithoutFail($id, $columns = ['*'])
 * @method TimePlan find($id, $columns = ['*'])
 * @method TimePlan first($columns = ['*'])
*/
class TimePlanRepository extends BaseRepository
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
        return TimePlan::class;
    }
}
