<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectBeneficiary
 * @package App\Models
 * @version August 3, 2018, 8:40 am UTC
 *
 * @property string project_id
 * @property integer beneficiary_id
 */
class ProjectBeneficiary extends Model
{
    use SoftDeletes;

    public $table = 'project_beneficiaries';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'beneficiary_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'string',
        'beneficiary_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'beneficiary_id' => 'required'
    ];

    
}
