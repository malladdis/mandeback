<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectFrequency
 * @package App\Models
 * @version August 3, 2018, 12:32 pm UTC
 *
 * @property integer project_id
 * @property integer frequency_id
 */
class ProjectFrequency extends Model
{
    use SoftDeletes;

    public $table = 'project_frequencies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'frequency_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'frequency_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'frequency_id' => 'required'
    ];

    
}
