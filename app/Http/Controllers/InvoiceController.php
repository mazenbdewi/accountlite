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
use Datatables;



class InvoiceController extends Controller
{

    public function index()

    {
            
                        
              
                 

        return view('admin.inv.index');
    }

     public function index3()

    {
        

        return view('admin.inv.index3');
    }

public function index4()

    {
        

        return view('admin.inv.index4');
    }







    public function show($id)
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
                        ->select('productName','orderdetails.productOrderPrice'
                            ,'orderdetails.productOrderQuantity','productOrderDis','productOrderAllPrice')
                        ->where('orderdetails.order_id','=',$id)
                        ->get();

        $productorders = DB::table('ordersell')                
                        ->select('sellName','sellPrice','sellQuantity','sellDisc','sellAllprice')
                        ->where('ordersell.order_id','=',$id)
                        ->get();

        $productQ = DB::table('orderdetails')
                    ->select('productOrderQuantity')
                    ->where('orderdetails.order_id','=',$id)
                    ->get();




                        

        return view('admin.inv.bill')->with('order',$order)
                                     ->with('productQ',$productQ)
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
        // $car = \DB::table('cars')->lists('carName','id');
        $customer = Customer::select(
        DB::raw("CONCAT(customerFirstName ,' ',customerLastName) AS full_name, id"))
                  ->get();     
       $q= DB::table('products')->get();
        return view('admin.inv.form')->with('data',$q)->with('catch3',$catch3)
                                     ->with('customer',$customer);
    }

    public function findCustomer(Request $request)
    {

         $data=Customer::select('limit')->where('id',$request->id)->first();
            return response()->json($data);
    }

    public function findQty(Request $request)
    {

         $qty=Product::select('productQuntity')->where('id',$request->id)->first();
            return response()->json($qty);
    }






    public function save(Request $request)
    {

      DB::transaction(function() use($request){ 


  
        $post=$request->all();
      
              
     
         $customerID=$post['customer_id'];
        
          $limit=DB::table('customers')->where('id',$customerID)->select('limit')->first();
          $backMoney=$post['backMoney'];
              
          $newlimit=($limit->limit)-$backMoney;
       
             DB::table('customers')->where('id',$customerID)->update(['limit'=>$newlimit]);

       
        $data=array(
                
                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
               
                'employeeName'=>$post['employeeName'],
                'customer_id'=>$post['customer_id'],
                'getMoney'=>$post['getMoney'],
                'backMoney'=>$post['backMoney'],
                'orderPayment'=>$post['getMoney']+$post['backMoney'],
                'disPrice'=>$post['disPrice'],
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
               session()->push('m','تم تثبيت الفاتورة بإمكانك طباعتها الآن');
             }
             else
             {
               session()->push('m','danger'); 
               session()->push('m','العدد الموجود في المستودع أقل من الطلبية');
             }
           
            }  
             
          }
     }); 
          return redirect('/adminpanel/inv/form'); 

                           
      
    } 



    public function destroy($id)

    {
       

    }

     public function formbuy()

    {
       
       $catch4=DB::table('orders')->select('id')
                                  ->where('orderType','=','buy')
                                  ->orderBy('id','desc')
                                  ->simplePaginate(1);

        $provider = Provider::select(
        DB::raw("CONCAT(providerFirstName ,' ',providerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');
        $employee = Employee::select(
        DB::raw("CONCAT(employeeFirstName ,' ',employeeLastName) AS full_name, id"))
                  ->lists('full_name', 'id');

        $q= DB::table('products')->get();
        return view('admin.inv.formbuy')->with('data',$q)->with('catch4',$catch4)->with('provider',$provider)->with('employee',$employee);
    }




    public function savebuy(Request $request)
    {

    


  
        $post=$request->all();
      
            

     
        
        $data=array(
                
                 'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
                  'employeeName'=>$post['employeeName'],
                'provider_id'=>$post['provider_id'],
                'getMoney'=>$post['backMoney'],
                'backMoney'=>$post['getMoney'],
                'orderOutPayment'=>$post['getMoney']+$post['backMoney'],
                
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
                    'productOrderAllPrice'=>$post['amount'][$i]
                    
                    );


              
            DB::table('orderdetails')->insert($datadetail); 
           
          

    
              
             $l=DB::table('orderdetails')->join('products','orderdetails.product_id','=','products.id')
                                           ->select('orderdetails.productOrderQuantity','products.productQuntity'
                                           ,'orderdetails.product_id','productOrderPrice')
                                            ->where('orderdetails.order_id','=',$j)
                                            ->get();


                    foreach ($l as  $value) {

                     $v1= $value->productOrderQuantity;
                     $v2= $value->productQuntity;
                     $v3=$value->productOrderPrice;
                   }
                    
                     
                     $d=$value->product_id;
                     $v=$v2+$v1;
                     $r=$v3;
                     
                    
              DB::table('products')->where('id',$d)->update(['productQuntity'=>$v,'productLastPrice'=>$r]);

               session()->push('m','success'); 
               session()->push('m','تم تثبيت الفاتورة بإمكانك طباعتها الآن');
             }
          
            }  
             
          
     
          return redirect('/adminpanel/inv/formbuy'); 
 
    
}

     public function orderbuy()

    {
       
        $id=DB::table('orders')->select('id')->orderBy('id','desc')->first();
        $provider = Provider::select(
        DB::raw("CONCAT(providerFirstName ,' ',providerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');

        $employees = Employee::select(
        DB::raw("CONCAT(employeeFirstName ,' ',employeeLastName) AS full_name, id"))
                  ->lists('full_name', 'id');
       $catch4=DB::table('orders')->select('id')
                                  ->where('orderType','=','buy')
                                  ->orderBy('id','desc')
                                  ->simplePaginate(1);

      //  $q= DB::table('products')->get();
        return view('admin.inv.orderbuy')->with('id',$id)->with('employees',$employees)->with('provider',$provider)->with('catch4',$catch4);
    }




    public function saveorderbuy(Request $request)
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
                    'sellName'=>$post['product_id'][$i],
                    'sellPrice'=>$post['price'][$i],
                    'sellQuantity'=>$post['qty'][$i],
                    'sellDisc'=>$post['dis'][$i],
                    'sellAllprice'=>$post['amount'][$i]
                    
                    );
             
        DB::table('ordersell')->insert($datadetail); 




            
            }  
             
          }
    }); 
          return redirect('/adminpanel/inv/orderbuy'); 

}

public function reform()
    {
       $catch6=DB::table('orders')->select('id')
                                  ->where('orderType','=','resell')
                                  ->orderBy('id','desc')
                                  ->simplePaginate(1);


       // $id=DB::table('orders')->select('id')->orderBy('id','desc')->first();
        // $car = \DB::table('cars')->lists('carName','id');
        $customer = Customer::select(
        DB::raw("CONCAT(customerFirstName ,' ',customerLastName) AS full_name, id"))
                  ->get();     
       $q= DB::table('products')->get();
        return view('admin.inv.reform')->with('data',$q)->with('catch6',$catch6)
                                     ->with('customer',$customer);
    }




    public function resave(Request $request)
    {
        DB::transaction(function() use($request){

        $post=$request->all();

          $customerID=$post['customer_id'];
        
             $limit=DB::table('customers')->where('id',$customerID)->select('limit')->first();
             $backMoney=$post['backMoney'];
              
          $newlimit=($limit->limit)+$backMoney;
       
             DB::table('customers')->where('id',$customerID)->update(['limit'=>$newlimit]);
        $data=array(

                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderDueDate'=>$post['orderDueDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
               'employeeName'=>$post['employeeName'],
                
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
          return redirect('/adminpanel/inv/reform'); 

                           
        
    } 

    public function reformbuy()
    {
        $id=DB::table('orders')->select('id')
                                  ->where('orderType','=','rebuy')
                                  ->orderBy('id','desc')
                                  ->simplePaginate(1);

        $provider = Provider::select(
        DB::raw("CONCAT(providerFirstName ,' ',providerLastName) AS full_name, id"))
                  ->lists('full_name', 'id');      

        $q= DB::table('products')->get();
        return view('admin.inv.reformbuy')->with('data',$q)->with('id',$id)->with('provider',$provider);
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
               
                'employeeName'=>$post['employeeName'],
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
          return redirect('/adminpanel/inv/reformbuy'); 

}

 public function formOut()
    {
      
        
        

        $q= DB::table('products')->get();
        return view('admin.inv.formOut')->with('data',$q);
                                     
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
          return redirect('/adminpanel/inv/formOut'); 

                           
        
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



                        

        return view('admin.inv.billsell')->with('order',$order)
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
                 

        return view('admin.inv.index2')->with('orders',$orders);
    }

    public function Datainv()
    {
        $orders = Order::join('customers','customers.id','=','orders.customer_id')
                        ->join('numbersell','orders.id','=','numbersell.order_id')
                        ->select(DB::raw('numbersell.id as numberSellId,orders.id as orderId, 
                          orders.id,orderDate,customerFirstName,customerLastName'));
                                       
                                       
               return Datatables::of($orders)

                   
            ->editColumn('action',function($model){
            
           
            return '<a href="/adminpanel/inv/'.$model->orderId.'"class="btn btn-info btn-circle" target="_blank"><i class="fa fa-edit">الفاتورة</i></a>';
        })

               ->make(true);

    }

    public function Datainvbuy()
    {
        $orders = Order::join('providers','providers.id','=','orders.provider_id')
                        ->join('numberbuy','orders.id','=','numberbuy.order_id')
                        ->select(DB::raw('numberbuy.id as numberBuyId,orders.id as orderById, 
                          orders.id,orderDate,providerFirstName,providerLastName'));
                                       
                                       
               return Datatables::of($orders)

                   
            ->editColumn('action',function($model){
            
           
            return '<a href="/adminpanel/inv/'.$model->orderById.'"class="btn btn-info btn-circle" target="_blank"><i class="fa fa-edit">الفاتورة</i></a>';
        })

               ->make(true);

    }

    public function Datainvall()
    {
        $orders = Order::select('id','orderDate');
                       
                                       
                                       
               return Datatables::of($orders)

                   
            ->editColumn('action',function($model){
            
           
            return '<a href="/adminpanel/inv/'.$model->id.'"class="btn btn-info btn-circle" target="_blank"><i class="fa fa-edit">الفاتورة</i></a>';
        })

               ->make(true);

    }







}