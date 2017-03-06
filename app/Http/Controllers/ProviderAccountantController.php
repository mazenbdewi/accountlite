<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Provider ;
use DB; 

class ProviderAccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers= Provider::all() ;

        return view('accountant.providers.index')->with('providers',$providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accountant.providers.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $providerFirstName=$request->input('providerFirstName');
        $providerMiddleName=$request->input('providerMiddleName');
        $providerLastName=$request->input('providerLastName');
        $providerMobile=$request->input('providerMobile');
        $providerPhoneJob=$request->input('providerPhoneJob');
        $providerPhoneHome=$request->input('providerPhoneHome');
        $providerAddress=$request->input('providerAddress');
        $providerCity=$request->input('providerCity');
        $providerNational=$request->input('providerNational');

        $new_provider = New provider ;

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

        return redirect('/accountant/providers') ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders= DB::table('orders')->join('providers','providers.id','=','orders.provider_id')
                               // ->join('numberbuy','numberbuy.order_id','=','orders.id')
                              ->select('orderType','orderPayment','orderOutPayment','orderDate','fromto','backMoney','getMoney','orders.id')
                              ->where('orders.provider_id','=',$id)
                              ->get();

        $orderProviders=DB::table('providers')
                        ->select('id','providerFirstName','providerLastName')
                        ->where('providers.id','=',$id)
                        ->get();

                                 $total = 0 ;
                                 $totalAllMoney=0;
                                 $totalGetMoney=0;
                        foreach( $orders as $order){

                          $totalGetMoney+= $order->getMoney ;  
             
                          $totalAllMoney+= $order->orderPayment ;  

                          $total  = $totalAllMoney-$totalGetMoney ;
                           
                        }
        $providers=DB::table('providers')->where('id','=',$id)
                                         ->update(['providerDebt'=>$total]);

        $limits=DB::table('providers')->where('id','=',$id)->select('limit')->get();

            foreach($limits as $limit)
            {
                $moneyLimit=$limit->limit;
            }



         return view('accountant.providers.debt')->with('orders',$orders)->with('orderProviders',$orderProviders)
                                            ->with('moneyLimit',$moneyLimit);    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id  , Provider $provider)
    {
        $provider = $provider->find($id);

        return view('accountant.providers.edit')->with('provider',$provider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , Provider $provider)
    {
        $providerFirstName=$request->input('providerFirstName');
        $providerMiddleName=$request->input('providerMiddleName');
        $providerLastName=$request->input('providerLastName');
        $providerMobile=$request->input('providerMobile');
        $providerPhoneJob=$request->input('providerPhoneJob');
        $providerPhoneHome=$request->input('providerPhoneHome');
        $providerAddress=$request->input('providerAddress');
        $providerCity=$request->input('providerCity');
        $providerNational=$request->input('providerNational');

        $provider = provider::find($id) ;
          
         $provider->providerFirstName=$providerFirstName;
         $provider->providerMiddleName=$providerMiddleName;
         $provider->providerLastName=$providerLastName;
         $provider->providerMobile=$providerMobile;
         $provider->providerPhoneJob=$providerPhoneJob;
         $provider->providerPhoneHome=$providerPhoneHome;
         $provider->providerAddress=$providerAddress;
         $provider->providerCity=$providerCity;
         $provider->providerNational=$providerNational;
         $provider->save();

         return redirect('/accountant/providers'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Provider $provider)
    {
       // Provider::destroy($id) ;
       // return redirect('/accountant/providers'); 
    }

     public function printDebtPreview($id)  
     
    {
        $orders= DB::table('orders')->join('providers','providers.id','=','orders.provider_id')
                               // ->join('numbersell','numbersell.order_id','=','orders.id')
                              ->select('orderType','orderOutPayment','orderPayment','fromto','orderDate','backMoney','getMoney','providers.providerDebt','orders.id')
                              ->where('orders.provider_id','=',$id)
                              ->get();
        //$bill=DB::table('numbersell')->join()
        $cust= Provider::find($id) ; 

                                 $total = 0 ;
                                 $totalAllMoney=0;
                                 $totalGetMoney=0;
                        foreach( $orders as $order){

                          $totalGetMoney+= $order->getMoney ;  
             
                          $totalAllMoney+= $order->orderPayment ;  

                          $total  = $totalAllMoney-$totalGetMoney ;
                           
                        }
        $providers=DB::table('providers')->where('providers.id','=',$id)
                                         ->update(['providerDebt'=>$total]);

        $limits=DB::table('providers')->where('providers.id','=',$id)->select('limit')->get();

            foreach($limits as $limit)
            {
                $moneyLimit=$limit->limit;
            }



         return view('accountant.providers.printdebt')->with('orders',$orders)->with('moneyLimit',$moneyLimit)
                                                 ->with('cust',$cust);
    }
}
