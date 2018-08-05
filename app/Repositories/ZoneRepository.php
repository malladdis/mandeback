<?php

namespace App\Repositories;

use App\Models\Zone;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ZoneRepository
 * @package App\Repositories
 * @version July 31, 2018, 4:21 pm UTC
 *
 * @method Zone findWithoutFail($id, $columns = ['*'])
 * @method Zone find($id, $columns = ['*'])
 * @method Zone first($columns = ['*'])
*/
class ZoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'region_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Zone::class;
    }
}
