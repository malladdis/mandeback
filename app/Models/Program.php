<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Program
 * @package App\Models
 * @version July 29, 2018, 3:03 pm UTC
 *
 * @property integer program_category_id
 * @property string name
 * @property string description
 */
class Program extends Model
{
    use SoftDeletes;

    public $table = 'programs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'program_category_id',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'program_category_id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'program_category_id' => 'required',
        'name' => 'required'
    ];

    public function program_detail() {
        return $this->hasOne(ProgramDetail::class);
    }

    public function project(){
        return $this->hasMany(Project::class);
    }
    public function category(){
        return $this->belongsTo(ProgramCategory::class);
    }
    
}
