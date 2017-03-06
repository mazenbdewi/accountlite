<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User ; 

class welcomeController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index()
    {

        $users = User::all();
        return view('welcome')->with('users',$users) ;   
    }
}
