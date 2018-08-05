<?php

namespace App\Repositories;

use App\Models\Implementer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ImplementerRepository
 * @package App\Repositories
 * @version July 31, 2018, 3:56 pm UTC
 *
 * @method Implementer findWithoutFail($id, $columns = ['*'])
 * @method Implementer find($id, $columns = ['*'])
 * @method Implementer first($columns = ['*'])
*/
class ImplementerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Implementer::class;
    }
}
