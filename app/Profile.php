<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user_role(){
        $this->hasOne('App\UserRole', 'role_id');
    }
}
