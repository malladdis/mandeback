<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OutcomeIndicator
 * @package App\Models
 * @version August 6, 2018, 5:36 pm UTC
 *
 * @property integer outcome_id
 * @property integer indicator_id
 */
class OutcomeIndicator extends Model
{
    use SoftDeletes;

    public $table = 'outcome_indicators';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'outcome_id',
        'indicator_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'outcome_id' => 'integer',
        'indicator_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'outcome_id' => 'required',
        'indicator_id' => 'required'
    ];

    
}
