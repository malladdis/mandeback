<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MilestoneActualValue
 * @package App\Models
 * @version October 2, 2018, 1:30 pm UTC
 *
 * @property integer milestone_id
 * @property integer value
 */
class MilestoneActualValue extends Model
{
    use SoftDeletes;

    public $table = 'milestone_actual_values';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'milestone_id',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'milestone_id' => 'integer',
        'value' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'milestone_id' => 'required',
        'value' => 'required'
    ];

    
}
