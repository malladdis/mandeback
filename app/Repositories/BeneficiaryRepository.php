<?php

namespace App\Repositories;

use App\Models\Beneficiary;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BeneficiaryRepository
 * @package App\Repositories
 * @version July 31, 2018, 3:58 pm UTC
 *
 * @method Beneficiary findWithoutFail($id, $columns = ['*'])
 * @method Beneficiary find($id, $columns = ['*'])
 * @method Beneficiary first($columns = ['*'])
*/
class BeneficiaryRepository extends BaseRepository
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
        return Beneficiary::class;
    }
}
