<?php

namespace App\Repositories;

use App\Models\Milestone;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MilestoneRepository
 * @package App\Repositories
 * @version October 2, 2018, 1:28 pm UTC
 *
 * @method Milestone findWithoutFail($id, $columns = ['*'])
 * @method Milestone find($id, $columns = ['*'])
 * @method Milestone first($columns = ['*'])
*/
class MilestoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'activity_id',
        'start',
        'end',
        'baseline',
        'target',
        'budget'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Milestone::class;
    }
}
