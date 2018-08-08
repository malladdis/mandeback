<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Indicator
 * @package App\Models
 * @version August 6, 2018, 5:28 pm UTC
 *
 * @property string name
 * @property string description
 */
class Indicator extends Model
{
    use SoftDeletes;

    public $table = 'indicators';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
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
