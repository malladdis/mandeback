<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DisaggregationMethod
 * @package App\Models
 * @version August 16, 2018, 2:26 pm UTC
 *
 * @property string name
 */
class DisaggregationMethod extends Model
{
    use SoftDeletes;

    public $table = 'disaggregation_methods';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
