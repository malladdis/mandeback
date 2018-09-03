<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Donor
 * @package App\Models
 * @version August 28, 2018, 7:11 pm UTC
 *
 * @property string name
 * @property double badget_amount
 * @property string status
 */
class Donor extends Model
{
    use SoftDeletes;

    public $table = 'donors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'contact',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'contact' => 'string',
        'status' => 'string'
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
