<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\User;

class adminController extends Controller
{
    public function index()

    {


        ############order#######
        $orderTables=DB::table('orders')->join('customers','orders.customer_id','=','customers.id')
                                        ->select('orders.id','customerFirstName','customerLastName','employeeName','orderDueDate','orderDate','orderType')
        								
                                       ->orderBy('id','DESC')
                                       ->simplePaginate(3);

        ########order Employee #######
        $orderEmployees=DB::table('orders')  
        					->select(DB::raw('COUNT(*) as Empcounting ,employeeName'),'employeeName')                           
                            ->groupBy('employeeName')
                            ->orderBy('employeeName','ASC')
                            ->get();

        ########order Customer #######
        $orderCustomers=DB::table('orders') ->join('customers','orders.customer_id','=','customers.id')  
        					->select(DB::raw('COUNT(*) as Cuscounting ,customer_id'),'customerFirstName','customerLastName')                           
                            ->groupBy('customer_id')
                            ->orderBy('customer_id','ASC')
                            ->get();

        ########Debts Customer #######
       $customersDebts= DB::table('customers')->join('orders','orders.customer_id','=','customers.id')
                              ->select('getMoney','customerDebt','orderOutPayment','customerFirstName','customerLastName')
                              
                              ->get();
        ######### online Employee #########
        $users = User::all();
        #########
        




                              

        
                                                       


        ###############

    	$products = DB::table('products')->select('productName','productQuntity','allQuantity','productNetPrice','productDescription')->get();

    	$chartbuy=DB::table('orders')->select(DB::raw('COUNT(*) as counting , month'))
    					        ->groupBy('month')
    					        ->orderBy('month','ASC')
    					        ->where('orderType','=','buy')
    					        ->get();
    	$chartsell=DB::table('orders')->select(DB::raw('COUNT(*) as counting , month'))
    					        ->groupBy('month')
    					        ->orderBy('month','ASC')
    					        ->where('orderType','=','sell')
    					        ->get();

    	#########Win####################

        $sells=DB::table('orders')->where('orderType','=','sell')  // المبيعات
                                     ->select('orderPayment','disPrice')
                                     ->get();
        $totalsell = 0 ;
        foreach ($sells as $sell){

            $totalsell+=($sell->orderPayment-$sell->disPrice) ;
            }

        ################end Sell####

        $resells=DB::table('orders')->where('orderType','=','resell')  //مردود المبيعات
                                     ->select('orderOutPayment')
                                     ->get();

        $totalResell = 0 ;
        foreach ($resells as $resell){

            $totalResell+=$resell->orderOutPayment ;
            }

        ########end Resell ########

        $netSell=$totalsell-$totalResell ; //صافي المبيعات

        ///////////END NetSell ///////////////

       

         $buys=DB::table('orders')->where('orderType','=','buy')  // المشتريات
                                     ->select('orderOutPayment')
                                     ->get();
      
                                     
        $totalbuy = 0 ;
        foreach ($buys as $buy){

        $totalbuy+=$buy->orderOutPayment ;
        }

        ########end Buy ##########
        $rebuys=DB::table('orders')->where('orderType','=','rebuy')  //مردود المشتريات
                                     ->select('orderOutPayment')
                                     ->get();

        $totalRebuy = 0 ;
        foreach ($rebuys as $rebuy){

            $totalRebuy+=$rebuy->orderPayment ;
            }


        $outForBuyes=DB::table('orders')->where('fromto','=','tranc')->select('orderOutPayment')->get();//مصاريف المشتريات

        $totalOutForBuyes=0;
        foreach($outForBuyes as $outForBuy){

            $totalOutForBuyes+= $outForBuy->orderOutPayment;

        }

        #########end Rebuy ##########

          $netBuy=$totalbuy-($totalRebuy) ; //صافي المشتريات

     $howMuchBuy=$netBuy+$totalOutForBuyes ; //تكلفة المشتريات

          

        /////////END NetBuy /////////////
        /////المخزون////
        $allStore=DB::table('products')->select('productNetPrice','productQuntity')->get();

         $totalStore=0;
        foreach($allStore as $store){

            $totalStore+= $store->productNetPrice*$store->productQuntity;

        }


        ////////

/*

        $firstGoods=DB::table('orders')->where('orderNote','=','firstgoods')->select('getMoney')
                                        
                                         ->get();

                 foreach($firstGoods as $firstGood){
                   $firstgoods= $firstGood->getMoney ;
                  
                }

                $lastGoods=DB::table('orders')->where('orderNote','=','lastgoods')->select('getMoney')
                                        
                                      
                                         ->get();

                 foreach($lastGoods as $lastGood){
                   $lastgoods= $lastGood->getMoney ;
                  
                }

                */

        $goodsForSell= $howMuchBuy   ;    //تكلفة المبيعات 




        ////////END goodsSell ////////

        $allWin=$netSell - $goodsForSell ; // مجمل الربح

        ////////END allWin ////////

        $outlays=DB::table('orders')->where('orderType','=','sandout' )->where('fromto','!=','tranc')   
                                    ->select('orderOutPayment')->get();

       
        $totaloutlay = 0 ;
        foreach ($outlays as $outlay){

            $totaloutlay+=$outlay->orderOutPayment ;}     //مجموع المصاريف المصاريف

        ##########END OUtlay###########

        
        $incomes=DB::table('orders') ->where('orderType','=','sandin' )
                                       ->where('orderPaymentType','!=','debt')
        
                                                                           

                                    ->select('getMoney')->get();

        $debts=DB::table('orders')->where('orderType','=','sell' )->orwhere('orderPaymentType','=','debt')    
                                   ->select('getMoney','orderPayment')->get();
            $allorderPayment=0;
            $allgetMoney=0;

        foreach($debts as $debt){
            $allorderPayment+=$debt->orderPayment;
              $allgetMoney+=$debt->getMoney;
                   

        }
        $allDebt= $allorderPayment- $allgetMoney;

        $totalincome = 0 ;
        foreach ($incomes as $income){

            $totalincome+=($income->getMoney) ;}   //مجموع الايرادات
        /////////END Income ////////////


        $netWin = $allWin + ($totalincome - $totaloutlay-$allDebt ); //صافي الربح


        ///////END  NET WIN //////


       
    	return view('admin.home.index')->with('products',$products)
    						           ->with('chartbuy',$chartbuy)
    						           ->with('chartsell',$chartsell)
    						           ->with('totalbuy',$totalbuy)
                                       ->with('totalRebuy',$totalRebuy)
                                       ->with('netBuy',$netBuy)
                                       ->with('totalsell',$totalsell)
                                       ->with('totalResell',$totalResell)
                                       ->with('netSell',$netSell)
                                       ->with('totalStore',$totalStore)
                                       ->with('goodsForSell',$goodsForSell)
                                      
                                       ->with('allWin',$allWin)
                                       ->with('totaloutlay',$totaloutlay)
                                       ->with('totalincome',$totalincome)
                                       ->with('orderTables',$orderTables)
                                       ->with('orderEmployees',$orderEmployees)
                                       ->with('orderCustomers',$orderCustomers)
                                       ->with('customersDebts',$customersDebts)
                                       
                                       ->with('users',$users)
                                       
                                       ->with('netWin',$netWin);
    }

   

}
