<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Currency
 * @package App\Models
 * @version August 28, 2018, 7:12 pm UTC
 *
 * @property string name
 * @property string abr
 * @property string symbol
 */
class Currency extends Model
{
    use SoftDeletes;

    public $table = 'currencies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'abr',
        'symbol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'abr' => 'string',
        'symbol' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'abr' => 'required'
    ];

    
}
