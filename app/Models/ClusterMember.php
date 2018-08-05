<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClusterMember
 * @package App\Models
 * @version July 31, 2018, 4:07 pm UTC
 *
 * @property integer woreda_id
 * @property integer kebele_id
 * @property integer cluster_id
 */
class ClusterMember extends Model
{
    use SoftDeletes;

    public $table = 'cluster_members';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kebele_id',
        'cluster_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kebele_id' => 'integer',
        'cluster_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kebele_id' => 'required',
        'cluster_id' => 'required'
    ];

    
}
