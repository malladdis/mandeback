<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ActivityBudget
 * @package App\Models
 * @version August 15, 2018, 7:20 pm UTC
 *
 * @property integer activity_id
 * @property double amount
 */
class ActivityBudget extends Model
{
    use SoftDeletes;

    public $table = 'activity_budgets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'activity_id',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'activity_id' => 'integer',
        'amount' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'activity_id' => 'required',
        'amount' => 'required'
    ];

    
}
