<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Car ; 

use DB ; 

class CarsController extends Controller
{
    public function index()
    {

    	  $cars = Car::all();
         return view('admin.cars.index')->with('cars',$cars);

    }

     public function create()
    {
        $cars = Car::all();

        return view('admin.cars.index')->with('cars',$cars);
    }


    

    public function store(Request $request)
    {
        $carNumber=$request->input('carNumber');
        $carName=$request->input('carName');
        $carModel=$request->input('carModel');
      
       DB::table('cars')->insert(['carNumber'=>$carNumber,'carName'=>$carName,'carModel'=>$carModel]);
       
       
      

        return redirect('/adminpanel/cars/create') ; 

    }

   


     public function edit($id , Car $car)
    {
        $car = $car->find($id);

        return view('admin.cars.edit')->with('car',$car);

    }

    public function update(Request $request, $id)
    {
        $carNumber=$request->input('carNumber');
        $carName=$request->input('carName');
        $carModel=$request->input('carModel');

        DB::table('cars')->where('id','=',$id)->update(['carNumber'=>$carNumber,'carName'=>$carName,'carModel'=>$carModel]);
       
       return redirect('/adminpanel/cars'); 


    }


  

}
