<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProgramCategory
 * @package App\Models
 * @version July 29, 2018, 2:38 pm UTC
 *
 * @property string name
 * @property string description
 */
class ProgramCategory extends Model
{
    use SoftDeletes;

    public $table = 'program_categories';
    

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

    public function programs(){
        return $this->hasMany(Program::class);
    }
}
