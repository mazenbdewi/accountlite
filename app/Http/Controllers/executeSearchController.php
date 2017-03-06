<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class executeSearchController extends Controller
{
    public function executeSearch()

    {
    	$keywords=Input::get('keywords');
    	$customers=Customer::all();
    	$searchCustomers=new \Illuminate\Database\Eloquent\Collection();

    	foreach ($customers as $u) 
    	{
    		if(Str::contains(Str::lover($u->customerFirstName),Str::lover($keywords)))
    			$searchCustomers->($u);
    	}

    	return view::make('searchCustomers')->with('searchCustomers',$searchCustomers);

    }
}
