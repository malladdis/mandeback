<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FinancePlan
 * @package App\Models
 * @version August 28, 2018, 3:37 pm UTC
 *
 * @property integer project_id
 * @property integer frequency_id
 * @property string values
 */
class FinancePlan extends Model
{
    use SoftDeletes;

    public $table = 'finance_plans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'finance_id',
        'name',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'finance_id' => 'integer',
        'name' => 'string',
        'value' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'finance_id' => 'required',
        'plans' => 'required',
    ];

    
}
