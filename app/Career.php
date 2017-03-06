<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function employees()
    {
    	return $this->hasMany('App\Employee','career_id','id');
    }
}
