<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{


	public function career()
    {
    	return $this->belongsTo('App\Career');
    }

     public function orders()
    {
    	return $this->hasMany('App\Order','employee_id','id');
    }
}
