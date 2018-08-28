<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Indicator
 * @package App\Models
 * @version August 6, 2018, 5:28 pm UTC
 *
 * @property string name
 * @property string description
 */
class Indicator extends Model
{
    use SoftDeletes;

    public $table = 'indicators';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'type_id',
        'measuring_unit_id',
        'frequency_id',
        'baseline_value',
        'source',
        'target_value',
        'is_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'type_id' => 'integer',
        'measuring_unit_id' => 'integer',
        'frequency_id' => 'integer',
        'baseline_value' => 'double',
        'source' => 'string',
        'target_value' => 'double',
        'is_total' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type_id' => 'required',
        'measuring_unit_id' => 'required',
        'frequency_id' => 'required',
        'baseline_value' => 'required',
        'target_value' => 'required',
        'is_total' => 'required'
    ];


    public function type(){
        return $this->belongsTo(DataType::class);
    }
    
}
