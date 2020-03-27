<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $guarded = [];
    
    public function portfolio(){
        return $this->hasOne('App\Portfolio');
    }
}
