<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectDetail
 * @package App\Models
 * @version July 31, 2018, 3:54 pm UTC
 *
 * @property integer cluster_id
 * @property float budget
 * @property string gloal
 * @property string objective
 */
class ProjectDetail extends Model
{
    use SoftDeletes;

    public $table = 'project_details';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'cluster_id',
        'budget',
        'gloal',
        'objective',
        'mng_1',
        'mng_2',
        'starting_date',
        'ending_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'cluster_id' => 'integer',
        'budget' => 'float',
        'gloal' => 'string',
        'objective' => 'string',
        'mng_1' => 'integer',
        'mng_2' => 'integer',
        'starting_date' => 'integer',
        'ending_date' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'cluster_id' => 'required',
        'budget' => 'required',
        'mng_1' => 'required',
        'starting_date' => 'required',
        'ending_date' => 'required'
    ];

    
}
