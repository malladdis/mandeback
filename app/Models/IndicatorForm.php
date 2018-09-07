<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IndicatorForm
 * @package App\Models
 * @version August 16, 2018, 2:29 pm UTC
 *
 * @property integer indicator_id
 * @property integer form_id
 */
class IndicatorForm extends Model
{
    use SoftDeletes;

    public $table = 'indicator_forms';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'indicator_id',
        'form_id',
        'calculation_method_id',
        'disaggregation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'indicator_id' => 'integer',
        'form_id' => 'integer',
        'calculation_method_id'=>'integer',
        'disaggregation'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'indicator_id' => 'required',
        'form_id' => 'required',
        'calculation_method_id'=>'required',
        'disaggregation'=>'required'
    ];

    
}
