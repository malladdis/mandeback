<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Budget
 * @package App\Models
 * @version August 24, 2018, 4:50 pm UTC
 *
 * @property double amount
 * @property integer currency_id
 * @property integer donor_id
 */
class Budget extends Model
{
    use SoftDeletes;

    public $table = 'budgets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'amount',
        'currency_id',
        'donor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'amount' => 'double',
        'currency_id' => 'string',
        'donor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'amount' => 'required',
        'currency_id' => 'required',
        'donor_id' => 'required'
    ];

    /**
     * @return Donor
     */
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
