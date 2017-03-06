<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB ;
use App\Account ;
use App\Cash ;
use App\Bank ;
use App\Provider;
use App\Employee ;
use App\Customer ; 


class AccountAccountantController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
              //   $employees = \DB::table('employees')->lists('employeeFirstName', 'id');

       // $orders=Order::all();
        $orders=DB::table('orders')                                
                                   ->select('id','orderType','orderDate','orderDueDate')
                                   ->where('orderType','=','sandget')
                                   ->orwhere('orderType','=','sandout')
                                   ->orderBy('id','desc');
                        
               $id=$request->input('id');
                  if(!empty($id))
                  {
                    $orders->where('id','LIKE',$id);

                  } 
                  $orderDate=$request->input('orderDate');
                  if(!empty($orderDate))
                  {
                    $orders->where('orderDate','LIKE','%'.$orderDate.'%');

                  } 

                 $orders=$orders->simplePaginate(10);

        return view('accountant.accounts.index')->with('orders',$orders);
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
      
        $provider = Provider::select(
        DB::raw("CONCAT(providerFirstName ,' ',providerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');

        $customer = Customer::select(
        DB::raw("CONCAT(customerFirstName ,' ',customerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');
        
    $catch=DB::table('orders')->select('id')
                                    ->where('orderType','=','sandout')
                                        
                                       ->orderBy('id','desc')
                                       ->simplePaginate(1);
    
                
        return view('accountant.accounts.form')->with('provider',$provider)->with('customer',$customer)->with('employee',$employee)->with('catch',$catch) ;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    if(isset($_POST["addsand"])){
        $orderType=$request->input('orderType');
        $provider_id=$request->input('provider_id');
        $customer_id=$request->input('customer_id');
        $orderDate=$request->input('orderDate');
        $orderOutPayment=$request->input('orderOutPayment');
        $orderPaymentType=$request->input('orderPaymentType');
        $fromto=$request->input('fromto');
        $orderCheckNO=$request->input('orderCheckNO');
        $orderBankName=$request->input('orderBankName');
        $employee_id=$request->input('employee_id');
        $employeeName=$request->input('employeeName');
        $orderNote=$request->input('orderNote');

        $sandout=DB::table('orders')->insertGetId(['orderType'=>$orderType,'provider_id'=>$provider_id,'customer_id'=>$customer_id,
            'orderDate'=>$orderDate,'orderOutPayment'=>$orderOutPayment,'orderPaymentType'=>$orderPaymentType,
            'fromto'=>$fromto,'orderCheckNO'=>$orderCheckNO,'orderBankName'=>$orderBankName,
            'employee_id'=>$employee_id,'employeeName'=>$employeeName,
            'orderNote'=>$orderNote]);
        DB::table('numbersandout')->insert(['order_id'=>$sandout]);
        return redirect ('/accountant/accounts/create') ;
    }
    elseif(isset($_POST["addprovider"])){

         $providerFirstName=$request->input('providerFirstName');
        $providerMiddleName=$request->input('providerMiddleName');
        $providerLastName=$request->input('providerLastName');
        $providerMobile=$request->input('providerMobile');
        $providerPhoneJob=$request->input('providerPhoneJob');
        $providerPhoneHome=$request->input('providerPhoneHome');
        $providerAddress=$request->input('providerAddress');
        $providerCity=$request->input('providerCity');
        $providerNational=$request->input('providerNational');

        $new_provider = New Provider ;

        $new_provider->providerFirstName=$providerFirstName;
        $new_provider->providerMiddleName=$providerMiddleName;
        $new_provider->providerLastName=$providerLastName;
        $new_provider->providerMobile=$providerMobile;
        $new_provider->providerPhoneJob=$providerPhoneJob;
        $new_provider->providerPhoneHome=$providerPhoneHome;
        $new_provider->providerAddress=$providerAddress;
        $new_provider->providerCity=$providerCity;
        $new_provider->providerNational=$providerNational;
        $new_provider->save();
         return redirect ('/accountant/accounts/create') ;
}

          

       
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

     public function showCash(Request $request)
     {
  $customer=Customer::lists('customerFirstName', 'id');

        $accountCash=DB::table('opens')->select('cash')->get();

                                 
       $showCashs=DB::table('orders')->where('orderPaymentType','=','cash')
                                     ->select('id','orderDate','orderType','getMoney','orderOutPayment')
                                     ->orderBy('orderDate','desc');

                    $orderDate=$request->input('orderDate');
                  if(!empty($orderDate))
                  {
                    $showCashs->where('orderDate','LIKE','%'.$orderDate.'%');

                  } 


$showCashs=$showCashs->get();


       


             
                               

        return view('accountant.accounts.showCash')->with('showCashs',$showCashs)->with('accountCash',$accountCash) ;
    }





    public function winAndLose(Request $request)
     {


        ####################

        $sells=DB::table('orders')->where('orderType','=','sell')  // المبيعات
                                     ->select('orderPayment')
                                     ->get();
        $totalsell = 0 ;
        foreach ($sells as $sell){

            $totalsell+=$sell->orderPayment ;}

        ################end Sell####

        $resells=DB::table('orders')->where('orderType','=','resell')  //مردود المبيعات
                                     ->select('orderOutPayment')
                                     ->get();

        $totalResell = 0 ;
        foreach ($resells as $resell){

            $totalResell+=$resell->orderOutPayment ;}

        ########end Resell ########

        $netSell=$totalsell-$totalResell ;

        ///////////END NetSell ///////////////

        $buys=DB::table('orders')->where('orderType','=','buy')  // المشتريات
                                     ->select('orderOutPayment')
                                     ->get();
        $totalbuy = 0 ;
        foreach ($buys as $buy){

        $totalbuy+=$buy->orderOutPayment ;}

        ########end Buy ##########
        $rebuys=DB::table('orders')->where('orderType','=','rebuy')  //مردود المشتريات
                                     ->select('orderPayment')
                                     ->get();

        $totalRebuy = 0 ;
        foreach ($rebuys as $rebuy){

            $totalRebuy+=$rebuy->orderPayment ;}

        #########end Rebuy ##########
        $outlaybuys=DB::table('orders')->where('TypeFromto','=','outlaybuy')  //مردود المشتريات
                                     ->select('orderOutPayment')
                                     ->get();

            $totaloutlaybuy = 0 ;
        foreach ($outlaybuys as $outlaybuy){

            $totaloutlaybuy+=$outlaybuy->orderOutPayment ;}
        #########End totaloutlaybuy ###################


            $netBuy=($totalbuy+$totaloutlaybuy)-$totalRebuy ;

        /////////END NetBuy /////////////

        $accountCashs=DB::table('opens')->select('cash','bank','firstGoods','lastGoods')->get();   // الصندوق عند الحساب الافتتاحي

        foreach($accountCashs as $accountCash){
                   $firstGoods= $accountCash->firstGoods ;
                   $lastGoods = $accountCash->lastGoods ;
                }

        $goodsForSell= $firstGoods + $netBuy  ;    //تكلفة البضاعة المتاحة للبيع 


        /////////END goodsForSell /////////

        $goodsSell=$goodsForSell - $lastGoods ;

        ////////END goodsSell ////////

        $allWin=$netSell - $goodsSell ;

        ////////END allWin ////////

        $outlays=DB::table('orders')->where('TypeFromto','=','outlay' )
                                    ->select('orderOutPayment')->get();

       
        $totaloutlay = 0 ;
        foreach ($outlays as $outlay){

            $totaloutlay+=$outlay->orderOutPayment ;}

        ##########END OUtlay###########

        
        $incomes=DB::table('orders')->where('TypeFromto','=','income' )
                                    ->select('orderPayment')->get();

        $totalincome = 0 ;
        foreach ($incomes as $income){

            $totalincome+=$income->orderPayment ;}
        /////////END Income ////////////


        $netWin = ($allWin + $totalincome) - $totaloutlay ;


        ///////END  NET WIN //////


        return view('accountant.accounts.winAndLose')->with('totalbuy',$totalbuy)
                                                ->with('totalRebuy',$totalRebuy)
                                                ->with('netBuy',$netBuy)
                                                ->with('totalsell',$totalsell)
                                                ->with('totalResell',$totalResell)
                                                ->with('netSell',$netSell)
                                                ->with('firstGoods',$firstGoods)
                                                ->with('lastGoods',$lastGoods)
                                                ->with('goodsForSell',$goodsForSell)
                                                ->with('goodsSell',$goodsSell)
                                                ->with('allWin',$allWin)
                                                ->with('totaloutlay',$totaloutlay)
                                                ->with('totalincome',$totalincome)
                                                ->with('netWin',$netWin);

     }


   

}