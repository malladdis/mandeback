<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataEntry extends Model
{
    //

    public function indicator(){
        return $this->belongsTo(Indicator::class);
    }

    public function disaggregation(){
        return $this->hasMany('App\Models\DataEntryDisaggregation','data_entry_id');
    }
}
