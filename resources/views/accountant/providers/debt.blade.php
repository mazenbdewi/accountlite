@extends('admin.layouts.layout')


@section('title')

الموردين
@endsection


@section('header')



@endsection




@section('content')




    <!-- Main content -->
   
    <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">

        <div class="col-xs-12">

          <div class="box">
           @foreach($orderProviders  as $orderProvider)
<p> <a href="/accountant/providers/printDebt/{{$orderProvider->id}}" target="_blank" class="btn btn-default"> معاينة الطباعة </a></p>
           <div class="box-body">

          <div class="panel panel-success">
          <p>كشف حساب المورد </p>
        <div class="panel-heading">

<p>
          
{{$orderProvider->providerFirstName}} {{$orderProvider->providerLastName}}


            @endforeach
</p>
             </div>
            

            
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                 <th width="10%">تسلسل</th>
                  <th width="10%">رقم المعرف</th>
                  <th>تاريخ الفاتورة</th>
                  <th>البيان</th>
                  
                  <th>مدين</th>
                  <th>دائن</th>
              
                 
                  
                 
                                 
                </tr>
                </thead>
                <tbody>
                <?php $totalGetMoney = 0 ;
                      $totalBackMoney = 0;
                      $totalAllMoney = 0;
                 ?>
                @foreach($orders as $index => $order)

              <tr>
              <td>   {{$index+1}} </td>
              <td>   {{$order->id}} </td>
              <td> {{$order->orderDate}} </td>
            
              <?php 

if($order->orderType=='sandin')
echo '<td>سند قبض '.$order->fromto.' </td>' ;
elseif($order->orderType=='sandout')
echo '<td>سند صرف '.$order->fromto.' </td>' ;
elseif($order->orderType=='rebuy')
echo '<td>مرتجع مشتريات</td>' ;
elseif($order->orderType=='buy')
echo '<td>فاتورة شراء</td>' ;


      ?>    


              <td> {{$order->orderOutPayment}}   </td>
              
              <td> {{$order->getMoney}}</td>
              
             
             
              <?php $totalGetMoney+= $order->getMoney ;  ?> 
             
              <?php $totalAllMoney+= $order->orderOutPayment ;  ?> 

               <?php $totalBackMoney= $totalAllMoney-$totalGetMoney ;  ?> 
              </tr>
               @endforeach
              

               
              <td>اجمالي المبالغ </td>
              <td></td>
              <td></td>
              <td></td>
              <td> <?php  echo $totalAllMoney ;  ?> </td>
              
              
              <td> <?php  echo $totalGetMoney ;  ?> </td>
               <?php if ($totalBackMoney>$moneyLimit)  echo "<td class='form-control bg-red'>".$totalBackMoney."</td>" ;

                    else 
                       echo "<td class='form-control bg-green'>".$totalBackMoney."</td>" ;    



                ?> 

              
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
   


@endsection









@section('footer')



@endsection