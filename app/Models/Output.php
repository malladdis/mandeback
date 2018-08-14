<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Output
 * @package App\Models
 * @version August 5, 2018, 6:56 pm UTC
 *
 * @property string name
 * @property string description
 * @property integer outcome_id
 * @property integer parent_id
 */
class Output extends Model
{
    use SoftDeletes;

    public $table = 'outputs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'type_id',
        'outcome_id',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'outcome_id' => 'integer',
        'type_id' => 'integer',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'outcome_id' => 'required',
        'type_id' => 'required',
        'parent_id' => 'required'
    ];

    
}
