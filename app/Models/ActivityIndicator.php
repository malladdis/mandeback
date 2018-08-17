<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ActivityIndicator
 * @package App\Models
 * @version August 17, 2018, 10:32 pm UTC
 *
 * @property integer activity_id
 * @property integer indicator_id
 */
class ActivityIndicator extends Model
{
    use SoftDeletes;

    public $table = 'activity_indicators';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'activity_id',
        'indicator_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'activity_id' => 'integer',
        'indicator_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'activity_id' => 'required',
        'indicator_id' => 'required'
    ];

    
}
