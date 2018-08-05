<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectCategory
 * @package App\Models
 * @version July 29, 2018, 3:35 pm UTC
 *
 * @property string name
 * @property string description
 */
class ProjectCategory extends Model
{
    use SoftDeletes;

    public $table = 'project_categories';
    

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

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
