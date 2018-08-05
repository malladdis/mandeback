<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProgramDetail
 * @package App\Models
 * @version July 29, 2018, 11:10 pm UTC
 *
 * @property string counrty
 * @property float budget
 * @property string starting_date
 * @property string ending_date
 */
class ProgramDetail extends Model
{
    use SoftDeletes;

    public $table = 'program_details';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'program_id',
        'country',
        'budget',
        'starting_date',
        'ending_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'program_id' => 'integer',
        'country' => 'string',
        'budget' => 'float',
        'starting_date' => 'string',
        'ending_date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'program_id' => 'required',
        'country' => 'required',
        'budget' => 'required',
        'starting_date' => 'required',
        'ending_date' => 'required'
    ];

    
}
