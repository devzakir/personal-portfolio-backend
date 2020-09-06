<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function sections(){
        return $this->hasMany(CourseSection::class);
    }

    public function lessons(){
        return $this->hasMany(CourseVideo::class);
    }

    public function category(){
        return $this->belongsTo(CourseCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
