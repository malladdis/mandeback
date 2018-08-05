<?php

namespace App\Repositories;

use App\Models\Kebele;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KebeleRepository
 * @package App\Repositories
 * @version August 1, 2018, 6:35 pm UTC
 *
 * @method Kebele findWithoutFail($id, $columns = ['*'])
 * @method Kebele find($id, $columns = ['*'])
 * @method Kebele first($columns = ['*'])
*/
class KebeleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'woreda_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kebele::class;
    }
}
