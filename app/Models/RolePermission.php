<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    //

    public function role(){
        return $this->belongsToMany(Role::class);
    }
}
