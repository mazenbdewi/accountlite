 $customer=Customer::lists('customerFirstName', 'id');

       
                                 
       $showCashs=DB::table('orders')->where('orderPaymentType','=','cash')
                                     ->select('getMoney','orderOutPayment')
                                     ->get();

        

              


       

        



        

        


        
        




        


        $disOuts=DB::table('orderdetails')->join('orders','orders.id','=','orderdetails.order_id')
                                          ->where('orderType','=','sell')
                                          ->select('productOrderAllPrice','productOrderDis')
                                          ->get();

        $disIns=DB::table('orderdetails')->join('orders','orders.id','=','orderdetails.order_id')
                                          ->where('orderType','=','buy')
                                          ->select('productOrderAllPrice','productOrderDis')
                                          ->get();




         $totaldisOut = 0 ; 
        foreach($disOuts as $disOut){
            $totaldisOut+=$disOut->productOrderAllPrice * $disOut->productOrderDis/100 ;

        }

        $totaldisIn = 0 ; 
        foreach($disIns as $disIn){
            $totaldisIn+=$disIn->productOrderAllPrice * $disIn->productOrderDis/100 ;

        }
           
         
            



         

             $totalsell = 0 ;
        foreach ($sells as $sell){

            $totalsell+=$sell->orderPayment ;}

             
 /*
        $salarys=DB::table('orders')->where('orderType','=','salary' )
                                    ->select('orderOutPayment')->get();
        $rents=DB::table('orders')->where('orderType','=','rent')
                                    ->select('orderOutPayment')->get();
        $electrics=DB::table('orders')->where('orderType','=','electric')
                                      ->select('orderOutPayment')->get();
        $waters=DB::table('orders')->where('orderType','=','water')
                                      ->select('orderOutPayment')->get();
        $adss=DB::table('orders')->where('orderType','=','ads')
                                      ->select('orderOutPayment')->get();
        $pens=DB::table('orders')->where('orderType','=','pen')
                                      ->select('orderOutPayment')->get();   //قرطاسية
        $adss=DB::table('orders')->where('orderType','=','ads')
                                      ->select('orderOutPayment')->get();
                                      */
             

        



  $total=(($accountCash->lastGoods+$totalsell+$totalRebuy)
                              -($accountCash->firstGoods+$totalbuy+$totalResell));

        
        return view('admin.accounts.winAndLose')->with('totalRebuy',$totalRebuy)
                                                ->with('totalResell',$totalResell)
                                                ->with('totalsell',$totalsell) 
                                                ->with('totalbuy',$totalbuy)
                                                ->with('totaldisOut',$totaldisOut) 
                                                ->with('totaldisIn',$totaldisIn)
                                                ->with('total',$total) 
                                                ->with('accountCash',$accountCash) ;

    }