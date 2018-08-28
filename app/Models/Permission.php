<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    public function rolePermission(){
        return $this->hasMany(RolePermission::class);
    }
}
