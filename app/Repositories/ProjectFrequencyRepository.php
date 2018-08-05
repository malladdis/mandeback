<?php

namespace App\Repositories;

use App\Models\ProjectFrequency;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectFrequencyRepository
 * @package App\Repositories
 * @version August 3, 2018, 12:32 pm UTC
 *
 * @method ProjectFrequency findWithoutFail($id, $columns = ['*'])
 * @method ProjectFrequency find($id, $columns = ['*'])
 * @method ProjectFrequency first($columns = ['*'])
*/
class ProjectFrequencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'frequency_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectFrequency::class;
    }
}
