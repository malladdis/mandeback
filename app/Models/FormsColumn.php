<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormsColumn extends Model
{
    //
    protected $fillable=['form_id','columns'];


    function form(){
        return $this->belongsTo(Form::class);
    }
}
