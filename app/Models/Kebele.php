<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kebele
 * @package App\Models
 * @version August 1, 2018, 6:35 pm UTC
 *
 * @property string name
 */
class Kebele extends Model
{
    use SoftDeletes;

    public $table = 'kebeles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'woreda_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'woreda_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'woreda_id' => 'required',
        'name' => 'required'
    ];

    
}
