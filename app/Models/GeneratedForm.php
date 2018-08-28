<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneratedForm extends Model
{
    //

    function forms(){
        return $this->belongsTo(Form::class);
    }
}
