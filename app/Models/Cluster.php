<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cluster
 * @package App\Models
 * @version July 31, 2018, 4:04 pm UTC
 *
 * @property string name
 * @property string description
 */
class Cluster extends Model
{
    use SoftDeletes;

    public $table = 'clusters';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function memebers() {
        return $this->hasMany(ClusterMember::class);
    }
}
