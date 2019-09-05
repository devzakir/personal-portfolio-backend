<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function role(){
        return $this->hasOne('App\UserRole', 'role_id');
    }
}
