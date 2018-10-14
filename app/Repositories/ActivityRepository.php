<?php

namespace App\Repositories;

use App\Models\Activity;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories
 * @version August 15, 2018, 6:57 pm UTC
 *
 * @method Activity findWithoutFail($id, $columns = ['*'])
 * @method Activity find($id, $columns = ['*'])
 * @method Activity first($columns = ['*'])
*/
class ActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'output_id',
        'description',
        'featured',
        'status_id',
        'activity_category_id',
        'baseline',
        'target',
        'kebele_id',
        'start_date',
        'end_date',
        'implementing_partners',
        'parent_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Activity::class;
    }
}
