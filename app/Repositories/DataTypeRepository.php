<?php

namespace App\Repositories;

use App\Models\DataType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataTypeRepository
 * @package App\Repositories
 * @version August 15, 2018, 1:22 pm UTC
 *
 * @method DataType findWithoutFail($id, $columns = ['*'])
 * @method DataType find($id, $columns = ['*'])
 * @method DataType first($columns = ['*'])
*/
class DataTypeRepository extends BaseRepository
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
        return DataType::class;
    }
}
