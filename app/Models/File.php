<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class File
 * @package App\Models
 * @version September 27, 2018, 8:17 pm UTC
 *
 * @property integer user_id
 * @property string name
 * @property required tag
 * @property string description
 */
class File extends Model
{
    use SoftDeletes;

    public $table = 'files';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'name',
        'tag',
        'description',
        'file_path',
        'is_activity_file',
        'parent_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'name' => 'string',
        'tag' => 'string',
        'description' => 'string',
        'file_path' => 'string',
        'is_activity_file' => 'boolean',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'file' => 'required',
        'is_activity_file' => 'required',
        'parent_id' => 'required'
    ];

    
}
