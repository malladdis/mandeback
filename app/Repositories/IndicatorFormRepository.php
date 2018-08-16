<?php

namespace App\Repositories;

use App\Models\IndicatorForm;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IndicatorFormRepository
 * @package App\Repositories
 * @version August 16, 2018, 2:29 pm UTC
 *
 * @method IndicatorForm findWithoutFail($id, $columns = ['*'])
 * @method IndicatorForm find($id, $columns = ['*'])
 * @method IndicatorForm first($columns = ['*'])
*/
class IndicatorFormRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'indicator_id',
        'form_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return IndicatorForm::class;
    }
}
