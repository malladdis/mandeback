<?php

namespace App\Repositories;

use App\Models\Woreda;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WoredaRepository
 * @package App\Repositories
 * @version July 31, 2018, 4:23 pm UTC
 *
 * @method Woreda findWithoutFail($id, $columns = ['*'])
 * @method Woreda find($id, $columns = ['*'])
 * @method Woreda first($columns = ['*'])
*/
class WoredaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'zone_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Woreda::class;
    }
}
