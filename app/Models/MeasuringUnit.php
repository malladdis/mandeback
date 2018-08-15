<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MeasuringUnit
 * @package App\Models
 * @version August 15, 2018, 1:25 pm UTC
 *
 * @property string name
 */
class MeasuringUnit extends Model
{
    use SoftDeletes;

    public $table = 'measuring_units';
    

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
