<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ExpenditureCategory
 * @package App\Models
 * @version August 25, 2018, 9:00 pm UTC
 *
 * @property string name
 */
class ExpenditureCategory extends Model
{
    use SoftDeletes;

    public $table = 'expenditure_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
    public function expenditures() {
        return $this->hasMany(Expenditure::class, 'expenditure_category_id');
    }
    
}
