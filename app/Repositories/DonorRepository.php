<?php

namespace App\Repositories;

use App\Models\Donor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DonorRepository
 * @package App\Repositories
 * @version August 28, 2018, 7:11 pm UTC
 *
 * @method Donor findWithoutFail($id, $columns = ['*'])
 * @method Donor find($id, $columns = ['*'])
 * @method Donor first($columns = ['*'])
*/
class DonorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'contact',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Donor::class;
    }
}
