<?php

namespace App\Repositories;

use App\Models\MeasuringUnit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MeasuringUnitRepository
 * @package App\Repositories
 * @version August 15, 2018, 1:25 pm UTC
 *
 * @method MeasuringUnit findWithoutFail($id, $columns = ['*'])
 * @method MeasuringUnit find($id, $columns = ['*'])
 * @method MeasuringUnit first($columns = ['*'])
*/
class MeasuringUnitRepository extends BaseRepository
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
        return MeasuringUnit::class;
    }
}
