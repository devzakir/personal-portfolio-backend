<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name','logo','navbar','copyright','about','phone','email','address','github','facebook','linkedin','stackoverflow','skype','quora'];
    
}
