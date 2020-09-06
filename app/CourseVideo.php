<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    protected $guarded = [];

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function section(){
        return $this->belongsTo('App\CourseSection', 'section_id');
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
