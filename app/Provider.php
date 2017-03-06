<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
     public function orders()
    {
    	return $this->hasMany('App\Order','provider_id','id');
    }
}
