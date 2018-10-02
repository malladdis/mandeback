<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Expenditure
 * @package App\Models
 * @version August 25, 2018, 9:02 pm UTC
 *
 * @property integer expenditure_category_id
 * @property string name
 * @property double amount
 */
class Expenditure extends Model
{
    use SoftDeletes;

    public $table = 'expenditures';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'finance_plan_id',
        'expenditure_category_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'finance_plan_id' => 'integer',
        'expenditure_category_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'finance_plan_id' => 'required',
        'expenditure_category_id' => 'required',
        'name' => 'required'
    ];

    
}
