<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataEntry extends Model
{
    //

    public function indicator(){
        return $this->belongsTo(Indicator::class);
    }
}
