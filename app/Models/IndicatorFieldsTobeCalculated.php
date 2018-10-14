<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicatorFieldsTobeCalculated extends Model
{
    //

    function indicatorForm(){
        return $this->belongsTo(IndicatorForm::class);
    }
}
