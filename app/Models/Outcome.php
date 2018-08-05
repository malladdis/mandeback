<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Outcome
 * @package App\Models
 * @version August 3, 2018, 9:29 am UTC
 *
 * @property integer project_id
 * @property string name
 * @property string description
 * @property integer parent_id
 */
class Outcome extends Model
{
    use SoftDeletes;

    public $table = 'outcomes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'name',
        'description',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'name' => 'required',
        'parent_id' => 'required'
    ];

    
}
