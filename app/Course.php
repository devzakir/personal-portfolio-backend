<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function sections(){
        return $this->hasMany(CourseSection::class);
    }
}
