<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer ; 
use App\Order ; 
use DB ;


class CustomerSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customers = Customer::all();
        $orders=Order::all();

       return view('seller.customers.index')->with('customers',$customers)->with('orders',$orders) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('seller.customers.index')->with('customers',$customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerFirstName=$request->input('customerFirstName');
        $customerMiddleName=$request->input('customerMiddleName');
        $customerLastName=$request->input('customerLastName');
        $customerMobile=$request->input('customerMobile');
        $customerPhoneJob=$request->input('customerPhoneJob');
        $customerPhoneHome=$request->input('customerPhoneHome');
        $customerAddress=$request->input('customerAddress');
        $customerCity=$request->input('customerCity');
        $customerNational=$request->input('customerNational');

        $new_customer = New Customer ;

        $new_customer->customerFirstName=$customerFirstName;
        $new_customer->customerMiddleName=$customerMiddleName;
        $new_customer->customerLastName=$customerLastName;
        $new_customer->customerMobile=$customerMobile;
        $new_customer->customerPhoneJob=$customerPhoneJob;
        $new_customer->customerPhoneHome=$customerPhoneHome;
        $new_customer->customerAddress=$customerAddress;
        $new_customer->customerCity=$customerCity;
        $new_customer->customerNational=$customerNational;
        $new_customer->save();

        return redirect('/seller/customers/create') ; 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Customer $customer)
    {
        $customer = $customer->find($id);

        return view('seller.customers.edit')->with('customer',$customer);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , Customer $customer)
    {
       $customerFirstName=$request->input('customerFirstName');
        $customerMiddleName=$request->input('customerMiddleName');
        $customerLastName=$request->input('customerLastName');
        $customerMobile=$request->input('customerMobile');
        $customerPhoneJob=$request->input('customerPhoneJob');
        $customerPhoneHome=$request->input('customerPhoneHome');
        $customerAddress=$request->input('customerAddress');
        $customerCity=$request->input('customerCity');
        $customerNational=$request->input('customerNational');

        $customer = Customer::find($id) ;
          
         $customer->customerFirstName=$customerFirstName;
         $customer->customerMiddleName=$customerMiddleName;
         $customer->customerLastName=$customerLastName;
         $customer->customerMobile=$customerMobile;
         $customer->customerPhoneJob=$customerPhoneJob;
         $customer->customerPhoneHome=$customerPhoneHome;
         $customer->customerAddress=$customerAddress;
         $customer->customerCity=$customerCity;
         $customer->customerNational=$customerNational;
         $customer->save();

         return redirect('/seller/customers'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Customer $customer)
    {
      
    }

   

      



   
}