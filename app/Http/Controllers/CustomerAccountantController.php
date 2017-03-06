<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer ; 
use App\Order ; 
use DB ;


class CustomerAccountantController extends Controller
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

       return view('accountant.customers.index')->with('customers',$customers)->with('orders',$orders) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('accountant.customers.index')->with('customers',$customers);
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
        $limit=$request->input('limit');

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
        $new_customer->limit=$limit;
        $new_customer->save();

        return redirect('/accountant/customers/create') ; 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $orders= DB::table('orders')->join('customers','customers.id','=','orders.customer_id')
                               // ->join('numbersell','numbersell.order_id','=','orders.id')
                              ->select('orderType','fromto','orderOutPayment','orderPayment','orderDate','backMoney','getMoney','customers.customerDebt','orders.id')
                              ->where('orders.customer_id','=',$id)
                              ->get();
      $orderCustomers=DB::table('customers')
                        ->select('id','customerFirstName','customerLastName')
                        ->where('customers.id','=',$id)
                        ->get();


                                 $total = 0 ;
                                 $totalAllMoney=0;
                                 $totalGetMoney=0;
                        foreach( $orders as $order){

                          $totalGetMoney+= $order->getMoney ;  
             
                          $totalAllMoney+= $order->orderPayment ; 

                          $totalOut+=$order->orderOutPayment ;

                          $total  = $totalAllMoney-($totalGetMoney+$totalOut) ;

                          
                           
                        }
        $customers=DB::table('customers')->where('customers.id','=',$id)
                                         ->update(['customerDebt'=>$total]);

        $limits=DB::table('customers')->where('customers.id','=',$id)->select('limit')->get();

            foreach($limits as $limit)
            {
                $moneyLimit=$limit->limit;
            }



         return view('accountant.customers.debt')->with('orders',$orders)->with('orderCustomers',$orderCustomers)
                                            ->with('moneyLimit',$moneyLimit);
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

        return view('accountant.customers.edit')->with('customer',$customer);

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
        $limit=$request->input('limit');


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
         $customer->limit=$limit;

         $customer->save();

         return redirect('/accountant/customers'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Customer $customer)
    {
       Customer::destroy($id) ;
        return redirect('/accountant/customers'); 
    }

    public function printDebtPreview($id)  
     
    {
      $orders= DB::table('orders')->join('customers','customers.id','=','orders.customer_id')
                               // ->join('numbersell','numbersell.order_id','=','orders.id')
                              ->select('orderType','orderOutPayment','orderPayment','fromto','orderDate','backMoney','getMoney','customers.customerDebt','orders.id')
                              ->where('orders.customer_id','=',$id)
                              ->get();
        //$bill=DB::table('numbersell')->join()
        $cust= Customer::find($id) ; 

                                 $total = 0 ;
                                 $totalAllMoney=0;
                                 $totalGetMoney=0;
                        foreach( $orders as $order){

                          $totalGetMoney+= $order->getMoney ;  
             
                          $totalAllMoney+= $order->orderPayment ;  

                          $total  = $totalAllMoney-$totalGetMoney ;
                           
                        }
        $customers=DB::table('customers')->where('customers.id','=',$id)
                                         ->update(['customerDebt'=>$total]);

        $limits=DB::table('customers')->where('customers.id','=',$id)->select('limit')->get();

            foreach($limits as $limit)
            {
                $moneyLimit=$limit->limit;
            }



         return view('accountant.customers.printdebt')->with('orders',$orders)->with('moneyLimit',$moneyLimit)
                                                 ->with('cust',$cust);
    }

      



   
}