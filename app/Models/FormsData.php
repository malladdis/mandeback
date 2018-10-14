<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormsData extends Model
{
    //


    function form(){
        return $this->belongsTo(Form::class);
    }
}
