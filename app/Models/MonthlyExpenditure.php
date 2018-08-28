<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MonthlyExpenditure
 * @package App\Models
 * @version August 28, 2018, 3:48 pm UTC
 *
 * @property integer finance_plan_id
 * @property integer expenditure_id
 * @property string starting_month
 * @property string values
 */
class MonthlyExpenditure extends Model
{
    use SoftDeletes;

    public $table = 'monthly_expenditures';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'finance_plan_id',
        'expenditure_id',
        'starting_month',
        'values'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'finance_plan_id' => 'integer',
        'expenditure_id' => 'integer',
        'starting_month' => 'string',
        'values' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'finance_plan_id' => 'required',
        'expenditure_id' => 'required',
        'starting_month' => 'required',
        'values' => 'required'
    ];

    
}
