<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Zone
 * @package App\Models
 * @version July 31, 2018, 4:21 pm UTC
 *
 * @property string name
 */
class Zone extends Model
{
    use SoftDeletes;

    public $table = 'zones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'region_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'region_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'region_id' => 'required',
        'name' => 'required'
    ];

    
}
