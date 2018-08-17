<?php

namespace App\Repositories;

use App\Models\ActivityIndicator;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActivityIndicatorRepository
 * @package App\Repositories
 * @version August 17, 2018, 10:32 pm UTC
 *
 * @method ActivityIndicator findWithoutFail($id, $columns = ['*'])
 * @method ActivityIndicator find($id, $columns = ['*'])
 * @method ActivityIndicator first($columns = ['*'])
*/
class ActivityIndicatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'activity_id',
        'indicator_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActivityIndicator::class;
    }
}
