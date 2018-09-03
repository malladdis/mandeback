<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Finance
 * @package App\Models
 * @version August 28, 2018, 6:35 pm UTC
 *
 * @property integer project_id
 * @property integer frequency_id
 */
class Finance extends Model
{
    use SoftDeletes;

    public $table = 'finances';
    

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
