<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;
use App\Order;
use App\Customer ;
use App\Employee ;
use App\Provider;

class CatchDocumentAccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
         return view('accountant.catchDocuments.add');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employee = Employee::select(
        DB::raw("CONCAT(employeeFirstName ,' ',employeeLastName) AS full_name, id"))
                  ->lists('full_name', 'id');

        $catch2=DB::table('orders')->select('id')
                                    ->where('orderType','=','sandin')
                                        
                                       ->orderBy('id','desc')
                                       ->simplePaginate(1);

        $customer = Customer::select(
        DB::raw("CONCAT(customerFirstName ,' ',customerLastName) AS full_name, id")
    )->lists('full_name', 'id');

        $provider = Provider::select(
        DB::raw("CONCAT(providerFirstName ,' ',providerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');
     
        return view('accountant.catchDocuments.add')
                                               ->with('customer',$customer)->with('employee',$employee)
                                               ->with('catch2',$catch2)->with('provider',$provider) ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $orderType=$request->input('orderType');
        $orderDate=$request->input('orderDate');
        $orderPaymentType=$request->input('orderPaymentType');
      //  $orderNote=$request->input('orderNote');
        $fromto=$request->input('fromto');
        $employeeName=$request->input('employeeName');
        $employee_id=$request->input('employee_id');
        $provider_id=$request->input('provider_id');
        $orderCheckNO=$request->input('orderCheckNO');
        $orderBankName=$request->input('orderBankName');
        $getMoney=$request->input('getMoney');
        $customer_id=$request->input('customer_id');

        $sandin=DB::table('orders')->insertGetId(['orderType'=>$orderType,'orderDate'=>$orderDate,
            'orderPaymentType'=>$orderPaymentType,'provider_id'=>$provider_id,'employeeName'=>$employeeName,'employee_id'=>$employee_id,'fromto'=>$fromto,
            'orderCheckNO'=>$orderCheckNO,'orderBankName'=>$orderBankName,
            'getMoney'=>$getMoney,'customer_id'=>$customer_id]);

         DB::table('numbersandin')->insert(['order_id'=>$sandin]);
    
        return redirect ('/accountant/catchDocuments/create') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
