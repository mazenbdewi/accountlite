@extends('admin.layouts.layout')


@section('title')

كشف حساب زبون
@endsection


@section('header')



@endsection




@section('content')




    <!-- Main content -->
    <section class="content" style="direction:rtl">
      <div class="row">

        <div class="col-xs-12">

          <div class="box">
           @foreach($orderCustomers  as $orderCustomer)
<p> <a href="/adminpanel/customers/printDebt/{{$orderCustomer->id}}" target="_blank" class="btn btn-default"> معاينة الطباعة </a></p>
           <div class="box-body">

          <div class="panel panel-success">
          <p>كشف حساب الزبون </p>
        <div class="panel-heading">

<p>
          
{{$orderCustomer->customerFirstName}} {{$orderCustomer->customerLastName}}


            @endforeach
</p>
             </div>
            
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="10%">تسلسل</th>
                  <th width="10%">رقم المعرف</th>
                  <th>البيان</th>
                  <th>تاريخ الفاتورة</th>
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
              <td>{{$index+1}} </td>
              <td>   {{$order->id}} </td>
             @if($order->orderType=='sandout')
              <td>سند صرف 
                    @if($order->fromto == 'rent')  <span>الأجار </span> 
                    @elseif($order->fromto == 'goods') <span>بضاعة </span> 
                    @elseif($order->fromto == 'tranc') <span>نقل </span>
                    @elseif($order->fromto == 'electric')  <span>فاتورة الكهرباء</span> 
                    @elseif($order->fromto == 'salary')  <span>الراتب </span> 
                    @elseif($order->fromto == 'overtime')  <span>ساعات عمل إضافية </span>
                    @elseif($order->fromto == 'rentSalary')  <span>سلفة على الراتب </span> 
                    @elseif($order->fromto == 'oil')  <span>وقود </span> 
                    @elseif($order->fromto == 'water') <span>فاتورة المياه </span> 
                    @elseif($order->fromto == 'fix')  <span>صيانة </span> 
                    @elseif($order->fromto == 'help')  <span>تعويضات </span> 
                    @elseif($order->fromto == 'travel')  <span>بدل سفر </span>
                    @elseif($order->fromto == 'tranc')  <span>بدل نقل </span> 
                    @elseif($order->fromto == 'oilemployee')  <span>بدل وقود </span> 
                    @elseif($order->fromto == 'fromhome')  <span>بدل سكن </span> 
                    @elseif($order->fromto == 'fromfood')  <span>بدل طعام </span> 
                    @elseif($order->fromto == 'returngoods')  <span>مرتجع بضاعة </span> 
                    @elseif($order->fromto == 'other')  <span>{{$order->fromto}}</span> 
                    @endif
                           </td> 
            @elseif($order->orderType=='sell') <td>فاتورة بيع</td>
            @elseif($order->orderType=='sandin') <td>سند قبض {{$order->fromto}}</td>
            @elseif($order->orderType=='resell') <td>مرتجع مشتريات</td>


                @endif

 
              <td> {{$order->orderDate}} </td>
              <td> {{number_format(($order->orderPayment+$order->orderOutPayment),2)}} </td>
              
              
              <td> {{number_format($order->getMoney,2)}}</td>
           
             
             
              <?php $totalGetMoney+= $order->getMoney ;  ?> 
             
              <?php $totalAllMoney+= $order->orderPayment+$order->orderOutPayment ;  ?> 

               <?php $totalBackMoney= $totalAllMoney-$totalGetMoney ;  ?> 
              </tr>
               @endforeach
              

               
              <td>اجمالي المبالغ </td>
              <td></td>
              <td></td>
              <td></td>
              <td> <?php  echo number_format($totalAllMoney,2) ;  ?> </td>
              
              
              <td> <?php  echo number_format($totalGetMoney,2) ;  ?> </td>
               <?php if ($totalBackMoney>$moneyLimit)  echo "<td class='form-control bg-red'>".number_format($totalBackMoney,2)."</td>" ;

                    else 
                       echo "<td class='form-control bg-green'>".number_format($totalBackMoney,2)."</td>" ;    



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
</div>

      <!-- /.row -->
    </section>
   


@endsection









@section('footer')



@endsection