<?php

namespace App\Repositories;

use App\Models\MilestoneActualValue;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MilestoneActualValueRepository
 * @package App\Repositories
 * @version October 2, 2018, 1:30 pm UTC
 *
 * @method MilestoneActualValue findWithoutFail($id, $columns = ['*'])
 * @method MilestoneActualValue find($id, $columns = ['*'])
 * @method MilestoneActualValue first($columns = ['*'])
*/
class MilestoneActualValueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'milestone_id',
        'value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MilestoneActualValue::class;
    }
}
