<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectImplementer
 * @package App\Models
 * @version August 3, 2018, 8:41 am UTC
 *
 * @property integer project_id
 * @property integer implementer_id
 */
class ProjectImplementer extends Model
{
    use SoftDeletes;

    public $table = 'project_implementers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'implementer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'implementer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'implementer_id' => 'required'
    ];

    
}
