<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Beneficiary
 * @package App\Models
 * @version July 31, 2018, 3:58 pm UTC
 *
 * @property string name
 * @property string describtion
 */
class Beneficiary extends Model
{
    use SoftDeletes;

    public $table = 'beneficiaries';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',

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
