<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //

    protected $fillable=['title','description'];


function    generatedForms(){
    return $this->hasOne(GeneratedForm::class);

}

function columns(){
    return $this->hasOne(FormsColumn::class);
}

function formData(){
    return $this->hasMany(FormsData::class);
}
}
