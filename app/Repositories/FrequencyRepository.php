<?php

namespace App\Repositories;

use App\Models\Frequency;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FrequencyRepository
 * @package App\Repositories
 * @version August 2, 2018, 7:21 pm UTC
 *
 * @method Frequency findWithoutFail($id, $columns = ['*'])
 * @method Frequency find($id, $columns = ['*'])
 * @method Frequency first($columns = ['*'])
*/
class FrequencyRepository extends BaseRepository
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
        return Frequency::class;
    }
}
