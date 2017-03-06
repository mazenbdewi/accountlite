<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public function products()
    {
        return $this->belongsToMany('App\Product','product_order','order_id','product_id')
        ->withpivot('productOrderPrice','productOrderQuantity','productOrderUnit');
    }

    public function employee()
    {
    	return $this->belongsTo('App\Employee');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function provider()
    {
    	return $this->belongsTo('App\Provider');
    }
}
