<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Woreda
 * @package App\Models
 * @version July 31, 2018, 4:23 pm UTC
 *
 * @property integer zone_id
 * @property string name
 */
class Woreda extends Model
{
    use SoftDeletes;

    public $table = 'woredas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'zone_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'zone_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'zone_id' => 'required',
        'name' => 'required'
    ];

    public function kebeles() {
        return $this->hasMany(Kebele::class);
    }
}
