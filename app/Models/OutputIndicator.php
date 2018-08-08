<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OutputIndicator
 * @package App\Models
 * @version August 7, 2018, 8:08 am UTC
 *
 * @property integer output_id
 * @property integer indicator_id
 */
class OutputIndicator extends Model
{
    use SoftDeletes;

    public $table = 'output_indicators';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'output_id',
        'indicator_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'output_id' => 'integer',
        'indicator_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'output_id' => 'required',
        'indicator_id' => 'required'
    ];

    
}
