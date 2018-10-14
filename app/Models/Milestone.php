<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Milestone
 * @package App\Models
 * @version October 2, 2018, 1:28 pm UTC
 *
 * @property integer activity_id
 * @property string start
 * @property string end
 * @property integer baseline
 * @property integer target
 * @property integer budget
 */
class Milestone extends Model
{
    use SoftDeletes;

    public $table = 'milestones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'activity_id',
        'start',
        'end',
        'baseline',
        'target',
        'budget'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'activity_id' => 'integer',
        'start' => 'string',
        'end' => 'string',
        'baseline' => 'integer',
        'target' => 'integer',
        'budget' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'activity_id' => 'required',
        'start' => 'required',
        'end' => 'required',
        'baseline' => 'required',
        'target' => 'required'
    ];

    
}
