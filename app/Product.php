<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = array('productQuntity');

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }



    public function orders()
    {
    	return $this->belongsToMany('App\Order','product_order','order_id','product_id');
    }
    

    
}
