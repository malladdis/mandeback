<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models
 * @version July 29, 2018, 3:42 pm UTC
 *
 * @property integer program_id
 * @property integer project_category_id
 * @property string name
 * @property string description
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'program_id',
        'project_category_id',
        'name',
        'description',
        'featured',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'program_id' => 'integer',
        'project_category_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'featured' => 'boolean',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'program_id' => 'required',
        'project_category_id' => 'required',
        'name' => 'required',
        'status_id' => 'required'
    ];

    public function details() {
        return $this->hasOne(ProjectDetail::class);
    }
    public function category() {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
    public function program(){
        return $this->belongsTo(Program::class);
    }
    
}
