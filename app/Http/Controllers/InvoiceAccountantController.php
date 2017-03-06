<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\saveInvoiceRequest;

use DB ;
use App\Order ;
use App\Provider;
use App\Product ;
use App\Employee;
use App\Customer;
use Auth;



class InvoiceAccountantController extends Controller
{

    public function index(Request $request)

    {
              //   $employees = \DB::table('employees')->lists('employeeFirstName', 'id');

       // $orders=Order::all();
        $orders=DB::table('orders')                              
                                   ->select('id','orderType','orderDate','orderDueDate')
                                   
                                   ->orderBy('id','desc');
                        
               $id=$request->input('id');
                  if(!empty($id))
                  {
                    $orders->where('id','LIKE','%'.$id.'%');

                  } 
                  $orderDate=$request->input('orderDate');
                  if(!empty($orderDate))
                  {
                    $orders->where('orderDate','LIKE','%'.$orderDate.'%');

                  } 

                 $orders=$orders->Paginate(10);
                 

        return view('accountant.inv.index')->with('orders',$orders);
    }





    public function show($id)
    {
        
       $order= Order::find($id);

        $employees=DB::table('orders')->select('employeeName')
                                       ->where('orders.id','=',$id)
                                       ->get();

        $orderCustomers=DB::table('customers')
                        ->join('orders','customers.id','=','orders.customer_id')
                        ->select('customerFirstName','customerLastName')
                        ->where('orders.id','=',$id)
                        ->get();

        $orderEmployees=DB::table('employees')
                        ->join('orders','employees.id','=','orders.employee_id')
                        ->select('employeeFirstName','employeeLastName')
                        ->where('orders.id','=',$id)
                        ->get();

        $orderProviders=DB::table('providers')
                        ->join('orders','providers.id','=','orders.provider_id')
                        ->select('providerFirstName','providerLastName')
                        ->where('orders.id','=',$id)
                        ->get();

        
        $numbersell=DB::table('numbersell')
                ->join('orders','numbersell.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numbersell.id')
                ->get();

        $numberbuy=DB::table('numberbuy')
                ->join('orders','numberbuy.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numberbuy.id')
                ->get();

        $numberrebuy=DB::table('numberrebuy')
                ->join('orders','numberrebuy.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numberrebuy.id')
                ->get();
        
        $numberresell=DB::table('numberresell')
                ->join('orders','numberresell.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numberresell.id')
                ->get();

        $numbersandin=DB::table('numbersandin')
                ->join('orders','numbersandin.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numbersandin.id')
                ->get();
        $numbersandout=DB::table('numbersandout')
                ->join('orders','numbersandout.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numbersandout.id')
                ->get();        

        $productNames = DB::table('products')
                        ->join('orderdetails','products.id','=','orderdetails.product_id')                  
                        ->select('productName','orderdetails.productOrderPrice'
                            ,'orderdetails.productOrderQuantity','productOrderDis','productOrderAllPrice')
                        ->where('orderdetails.order_id','=',$id)
                        ->get();

        $productorders = DB::table('ordersell')                
                        ->select('sellName','sellPrice','sellQuantity','sellDisc','sellAllprice')
                        ->where('ordersell.order_id','=',$id)
                        ->get();



                        

        return view('accountant.inv.bill')->with('order',$order)
                                     ->with('employees',$employees)
                                     ->with('orderCustomers',$orderCustomers)
                                     ->with('orderEmployees',$orderEmployees)
                                     ->with('orderProviders',$orderProviders)
                                     ->with('productorders',$productorders)
                                     ->with('numbersell',$numbersell)
                                     ->with('numberbuy',$numberbuy)
                                     ->with('numberrebuy',$numberrebuy)
                                     ->with('numberresell',$numberresell)
                                     ->with('numbersandin',$numbersandin)
                                     ->with('numbersandout',$numbersandout)
                                     ->with('productNames',$productNames);


    }
    
    public function form()
    {
     
       $catch3=DB::table('orders')->select('id')
                                  ->where('orderType','=','sell')
                                  ->orderBy('id','desc')
                                  ->simplePaginate(1);

       // $id=DB::table('orders')->select('id')->orderBy('id','desc')->first();
         $car = \DB::table('cars')->lists('carName','id');
        $customer = Customer::select(
        DB::raw("CONCAT(customerFirstName ,' ',customerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');     
       $q= DB::table('products')->get();
        return view('accountant.inv.form')->with('data',$q)->with('catch3',$catch3)->with('car',$car)
                                     ->with('customer',$customer);
    }




    public function save(Request $request)
    {

      DB::transaction(function() use($request){ 

        $post=$request->all();
      
              

         
       
        $data=array(
                
                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
                'car_id'=>$post['car_id'],
                'kilo'=>$post['kilo'],
                'employeeName'=>$post['employeeName'],
                'customer_id'=>$post['customer_id'],
                'getMoney'=>$post['getMoney'],
                'backMoney'=>$post['backMoney'],
                'orderPayment'=>$post['getMoney']+$post['backMoney'],
                'month'=>date('m')
                
            );

        $j=DB::table('orders')->insertGetId($data);
        if($j>0)
        {
         
           DB::table('numbersell')->insert(['order_id'=>$j]);

            for($i=0;$i<count($post['product_id']);$i++)
            {

                           

                $datadetail = array(

                    'order_id'=>$j,
                    'product_id'=>$post['product_id'][$i],
                    'productOrderPrice'=>$post['price'][$i],
                    'productOrderQuantity'=>$post['qty'][$i],
                    'productOrderDis'=>$post['dis'][$i],
                    'productOrderAllPrice'=>$post['amount'][$i]
                    
                    );

              
            DB::table('orderdetails')->insert($datadetail); 

    
              
               $l=DB::table('orderdetails')->join('products','orderdetails.product_id','=','products.id')
                                           ->select('orderdetails.productOrderQuantity','products.productQuntity','orderdetails.product_id')
                                            ->where('orderdetails.order_id','=',$j)
                                            ->get();


                    foreach ($l as  $value) {

                     $v1= $value->productOrderQuantity;
                     $v2= $value->productQuntity;
                   }
                     if($v1<=$v2)
                     {
                     $d=$value->product_id;
                     $v=$v2-$v1;
                     
                    
              DB::table('products')->where('id',$d)->update(['productQuntity'=>$v]);

               session()->push('m','success'); 
               session()->push('m','OK');
             }
             else
             {
               session()->push('m','danger'); 
               session()->push('m','العدد الموجود في المستودع أقل من الطلبية');
             }
           
            }  
             
          }
     }); 
          return redirect('/accountant/inv/form'); 

                           
      
    } 



    public function destroy($id)

    {
       

    }

     public function formbuy()

    {
       
        $id=DB::table('orders')->select('id')->orderBy('id','desc')->first();
        $provider = Provider::select(
        DB::raw("CONCAT(providerFirstName ,' ',providerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');
        

        $q= DB::table('products')->get();
        return view('accountant.inv.formbuy')->with('data',$q)->with('id',$id)->with('provider',$provider);
    }




    public function savebuy(Request $request)
    {

       DB::transaction(function() use($request){

        $post=$request->all();
        $data=array(

                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
                'orderBankName'=>$post['orderBankName'],
                'orderCheckNO'=>$post['orderCheckNO'],
                'employee_id'=>$post['employee_id'],
                'provider_id'=>$post['provider_id'],
                'getMoney'=>$post['getMoney'],
                'backMoney'=>$post['backMoney'],
                'orderOutPayment'=>$post['getMoney']+$post['backMoney']
                
            );

        $j=DB::table('orders')->insertGetId($data);
        if($j>0)
        {

          DB::table('numberbuy')->insert(['order_id'=>$j]);

            for($i=0;$i<count($post['product_id']);$i++)
            {
                $datadetail = array(

                    'order_id'=>$j,
                    'product_id'=>$post['product_id'][$i],
                    'productOrderPrice'=>$post['price'][$i],
                    'productOrderQuantity'=>$post['qty'][$i],
                    'productOrderDis'=>$post['dis'][$i],
                    'productOrderAllPrice'=>$post['amount'][$i]
                    
                    );
             
        DB::table('orderdetails')->insert($datadetail); 

        $l=DB::table('orderdetails')->join('products','orderdetails.product_id','=','products.id')
                                    ->select('orderdetails.productOrderQuantity','products.productQuntity','orderdetails.product_id')
                                    ->where('orderdetails.order_id','=',$j)
                                    ->get();


                    foreach ($l as  $value) {

                     $v1= $value->productOrderQuantity;
                     $v2= $value->productQuntity;
                   }
                     
                     $d=$value->product_id;
                     $v=$v2+$v1;
                     
                    
              DB::table('products')->where('id',$d)->update(['productQuntity'=>$v]);

               session()->push('m','success'); 
               session()->push('m','OK');
             
            
            }  
             
          }
    }); 
          return redirect('/accountant/inv/formbuy'); 

}

public function reform()
    {
        $id=DB::table('orders')->select('id')->orderBy('id','desc')->first();
       
         $customer = Customer::select(
        DB::raw("CONCAT(customerFirstName ,' ',customerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');  

        $q= DB::table('products')->get();
        return view('accountant.inv.reform')->with('data',$q)->with('id',$id)->with('customer',$customer);
    }




    public function resave(Request $request)
    {
        DB::transaction(function() use($request){

        $post=$request->all();
        $data=array(

                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
                'orderBankName'=>$post['orderBankName'],
                'orderCheckNO'=>$post['orderCheckNO'],
                'employee_id'=>$post['employee_id'],
                'customer_id'=>$post['customer_id'],
                'getMoney'=>$post['getMoney'],
                'backMoney'=>$post['backMoney'],
                'orderOutPayment'=>$post['getMoney']+$post['backMoney']
                
            );

        $j=DB::table('orders')->insertGetId($data);
        if($j>0)
        {
          DB::table('numberresell')->insert(['order_id'=>$j]);

            for($i=0;$i<count($post['product_id']);$i++)
            {
                $datadetail = array(

                    'order_id'=>$j,
                    'product_id'=>$post['product_id'][$i],
                    'productOrderPrice'=>$post['price'][$i],
                    'productOrderQuantity'=>$post['qty'][$i],
                    'productOrderDis'=>$post['dis'][$i],
                    'productOrderAllPrice'=>$post['amount'][$i]
                    
                    );             

                 DB::table('orderdetails')->insert($datadetail); 

        $l=DB::table('orderdetails')->join('products','orderdetails.product_id','=','products.id')
                                    ->select('orderdetails.productOrderQuantity','products.productQuntity','orderdetails.product_id')
                                    ->where('orderdetails.order_id','=',$j)
                                    ->get();


                    foreach ($l as  $value) {

                     $v1= $value->productOrderQuantity;
                     $v2= $value->productQuntity;
                   }
                     
                     $d=$value->product_id;
                     $v=$v2+$v1;
                     
                    
              DB::table('products')->where('id',$d)->update(['productQuntity'=>$v]);

               session()->push('m','success'); 
               session()->push('m','OK');
             
            
            }  
             
          }
  });
          return redirect('/accountant/inv/reform'); 

                           
        
    } 

    public function reformbuy()
    {
        $id=DB::table('orders')->select('id')->orderBy('id','desc')->first();

        $provider = Provider::select(
        DB::raw("CONCAT(providerFirstName ,' ',providerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');      

        $q= DB::table('products')->get();
        return view('accountant.inv.reformbuy')->with('data',$q)->with('id',$id)->with('provider',$provider);
    }




    public function resavebuy(Request $request)
    {
        DB::transaction(function() use($request){

        $post=$request->all();
        $data=array(

                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
                'orderBankName'=>$post['orderBankName'],
                'orderCheckNO'=>$post['orderCheckNO'],
                'employee_id'=>$post['employee_id'],
                'provider_id'=>$post['provider_id'],
                'getMoney'=>$post['getMoney'],
                'backMoney'=>$post['backMoney'],
                'orderPayment'=>$post['getMoney']+$post['backMoney']
                
            );

        $j=DB::table('orders')->insertGetId($data);
        if($j>0)
        {
          DB::table('numberrebuy')->insert(['order_id'=>$j]);

            for($i=0;$i<count($post['product_id']);$i++)
            {
                $datadetail = array(

                    'order_id'=>$j,
                    'product_id'=>$post['product_id'][$i],
                    'productOrderPrice'=>$post['price'][$i],
                    'productOrderQuantity'=>$post['qty'][$i],
                    'productOrderDis'=>$post['dis'][$i],
                    'productOrderAllPrice'=>$post['amount'][$i]
                    
                    );
             

DB::table('orderdetails')->insert($datadetail); 

    
              
               $l=DB::table('orderdetails')->join('products','orderdetails.product_id','=','products.id')
                                           ->select('orderdetails.productOrderQuantity','products.productQuntity','orderdetails.product_id')
                                            ->where('orderdetails.order_id','=',$j)
                                            ->get();


                    foreach ($l as  $value) {

                     $v1= $value->productOrderQuantity;
                     $v2= $value->productQuntity;
                   }
                     if($v1<=$v2)
                     {
                     $d=$value->product_id;
                     $v=$v2-$v1;
                     
                    
              DB::table('products')->where('id',$d)->update(['productQuntity'=>$v]);

               session()->push('m','success'); 
               session()->push('m','OK');
             }
             else
             {
               session()->push('m','danger'); 
               session()->push('m','العدد الموجود في المستودع أقل من الطلبية');
             }
           
            }  
             
          }
  });
          return redirect('/accountant/inv/reformbuy'); 

}

 public function formOut()
    {
      
        
        

        $q= DB::table('products')->get();
        return view('accountant.inv.formOut')->with('data',$q);
                                     
    }




    public function saveOut(Request $request)
    {

        DB::transaction(function() use($request){

        $post=$request->all();
      
               
        $data=array(
                
                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
                'orderBankName'=>$post['orderBankName'],
                'orderCheckNO'=>$post['orderCheckNO'],
                'employeeName'=>$post['employeeName'],
                'getMoney'=>$post['getMoney'],
                'backMoney'=>$post['backMoney'],
                'orderPayment'=>$post['getMoney']+$post['backMoney'],
                'month'=>date('m')
                
            );

        $j=DB::table('orders')->insertGetId($data);
        if($j>0)
        {
         
           DB::table('numberout')->insert(['order_id'=>$j]);

            for($i=0;$i<count($post['product_id']);$i++)
            {

                           

                $datadetail = array(

                    'order_id'=>$j,
                    'product_id'=>$post['product_id'][$i],
                    'productOrderPrice'=>$post['price'][$i],
                    'productOrderQuantity'=>$post['qty'][$i],
                    'productOrderDis'=>$post['dis'][$i],
                    'productOrderAllPrice'=>$post['amount'][$i]
                    
                    );
  
            DB::table('orderdetails')->insert($datadetail); 
                   
                 
                }
                      
    }
  });
          return redirect('/accountant/inv/formOut'); 

                           
        
    } 

     public function showbuy($id)
    {
        
       // $orders = DB::table('orders')->select('id','orderDate','orderType')->where('id',$id)->get();
         

        $order= Order::find($id);

        $employees=DB::table('orders')->select('employeeName')
                                       ->where('orders.id','=',$id)
                                       ->get();

        $orderCustomers=DB::table('customers')
                        ->join('orders','customers.id','=','orders.customer_id')
                        ->select('customerFirstName','customerLastName')
                        ->where('orders.id','=',$id)
                        ->get();

        $orderEmployees=DB::table('employees')
                        ->join('orders','employees.id','=','orders.employee_id')
                        ->select('employeeFirstName','employeeLastName')
                        ->where('orders.id','=',$id)
                        ->get();

        $orderProviders=DB::table('providers')
                        ->join('orders','providers.id','=','orders.provider_id')
                        ->select('providerFirstName','providerLastName')
                        ->where('orders.id','=',$id)
                        ->get();

        
        $numbersell=DB::table('numbersell')
                ->join('orders','numbersell.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numbersell.id')
                ->get();

        $numberbuy=DB::table('numberbuy')
                ->join('orders','numberbuy.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numberbuy.id')
                ->get();

        $numberrebuy=DB::table('numberrebuy')
                ->join('orders','numberrebuy.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numberrebuy.id')
                ->get();
        
        $numberresell=DB::table('numberresell')
                ->join('orders','numberresell.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numberresell.id')
                ->get();

        $numbersandin=DB::table('numbersandin')
                ->join('orders','numbersandin.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numbersandin.id')
                ->get();
        $numbersandout=DB::table('numbersandout')
                ->join('orders','numbersandout.order_id','=','orders.id')
                ->where('orders.id','=',$id)
                ->select('numbersandout.id')
                ->get();        

        $productNames = DB::table('products')
                        ->join('orderdetails','products.id','=','orderdetails.product_id')                  
                        ->select('productCode','productName','orderdetails.productOrderPrice'
                            ,'orderdetails.productOrderQuantity','productOrderDis','productOrderAllPrice')
                        ->where('orderdetails.order_id','=',$id)
                        ->get();

        $productorders = DB::table('ordersell')                
                        ->select('sellName','sellPrice','sellQuantity','sellDisc','sellAllprice')
                        ->where('ordersell.order_id','=',$id)
                        ->get();



                        

        return view('accountant.inv.billsell')->with('order',$order)
                                     ->with('employees',$employees)
                                     ->with('orderCustomers',$orderCustomers)
                                     ->with('orderEmployees',$orderEmployees)
                                     ->with('orderProviders',$orderProviders)
                                     ->with('productorders',$productorders)
                                     ->with('numbersell',$numbersell)
                                     ->with('numberbuy',$numberbuy)
                                     ->with('numberrebuy',$numberrebuy)
                                     ->with('numberresell',$numberresell)
                                     ->with('numbersandin',$numbersandin)
                                     ->with('numbersandout',$numbersandout)
                                     ->with('productNames',$productNames);


    }

    public function index2(Request $request)

    {
              //   $employees = \DB::table('employees')->lists('employeeFirstName', 'id');

       // $orders=Order::all();
        $orders=DB::table('orders')                              
                                   ->select('id','orderType','orderDate','orderDueDate')
                                   ->where('orderType','=','sell')
                                   ->orderBy('id','desc');
                        
               $id=$request->input('id');
                  if(!empty($id))
                  {
                    $orders->where('id','LIKE','%'.$id.'%');

                  } 
                  $orderDate=$request->input('orderDate');
                  if(!empty($orderDate))
                  {
                    $orders->where('orderDate','LIKE','%'.$orderDate.'%');

                  } 

                 $orders=$orders->Paginate(10);
                 

        return view('accountant.inv.index2')->with('orders',$orders);
    }





}