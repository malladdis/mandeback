<?php

namespace App\Repositories;

use App\Models\ProjectBeneficiary;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectBeneficiaryRepository
 * @package App\Repositories
 * @version August 3, 2018, 8:40 am UTC
 *
 * @method ProjectBeneficiary findWithoutFail($id, $columns = ['*'])
 * @method ProjectBeneficiary find($id, $columns = ['*'])
 * @method ProjectBeneficiary first($columns = ['*'])
*/
class ProjectBeneficiaryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'beneficiary_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectBeneficiary::class;
    }
}
