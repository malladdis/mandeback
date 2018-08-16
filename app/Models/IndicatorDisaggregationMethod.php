<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IndicatorDisaggregationMethod
 * @package App\Models
 * @version August 16, 2018, 2:27 pm UTC
 *
 * @property integer indicator_id
 * @property integer disaggregation_method_id
 */
class IndicatorDisaggregationMethod extends Model
{
    use SoftDeletes;

    public $table = 'indicator_disaggregation_methods';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'indicator_id',
        'disaggregation_method_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'indicator_id' => 'integer',
        'disaggregation_method_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'indicator_id' => 'required',
        'disaggregation_method_id' => 'required'
    ];

    
}
