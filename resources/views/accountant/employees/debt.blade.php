@extends('admin.layouts.layout')


@section('title')

كشف حساب موظف
@endsection


@section('header')



@endsection




@section('content')




    <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">

        <div class="col-xs-12">

          <div class="box">

           <div class="box-body">
  @foreach($employees  as $employee)
 <p> <a href="/accountant/employees/printDebt/{{$employee->id}}" target="_blank" class="btn btn-default"> معاينة الطباعة </a></p>


          <div class="panel panel-success">
          <p>كشف حساب الموظف </p>
        <div class="panel-heading">

<p>
         
{{$employee->employeeFirstName}} {{$employee->employeeLastName}}


            @endforeach
</p>
             </div>
           
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th width="10%">المعرف</th>
                  <th>التاريخ</th>
                 
                  
                   <th>البيان</th>
                   <th> مدين</th>
                  <th>دائن </th>

                  
                 
                                 
                </tr>
                </thead>
                <tbody>
              
       
                @foreach($orders as $order)

              <tr>
              <td>   {{$order->id}} </td>
              <td> {{$order->orderDate}} </td>
           
          
              
                <?php
                if($order->fromto=='salary')
                  echo '<td>الراتب '.$order->orderNote.'</td>';
                elseif($order->fromto=='overtime')
                   echo '<td>اضافي '.$order->orderNote.'</td>';
                 elseif($order->fromto=='rentSalary')
                   echo '<td>سلفة راتب '.$order->orderNote.'</td>';
                 elseif($order->fromto=='help')
                   echo '<td>تعويض '.$order->orderNote.'</td>';
                 elseif($order->fromto=='travel')
                   echo '<td>بدل سفر '.$order->orderNote.'</td>';
                 elseif($order->fromto=='tranc')
                   echo '<td>بدل نقل '.$order->orderNote.'</td>';
                 elseif($order->fromto=='oilemployee')
                   echo '<td>بدل وقود '.$order->orderNote.'</td>';
                 elseif($order->fromto=='fromhome')
                   echo '<td>بدل سكن '.$order->orderNote.'</td>';
                 elseif($order->fromto=='fromfood')
                   echo '<td>بدل طعام '.$order->orderNote.'</td>';
                 else
                    echo '<td>'.$order->fromto.' '.$order->orderNote.'</td>';



                 ?>
              <td>{{$order->orderOutPayment}}</td>
          
              <td> {{$order->getMoney}}</td>
             


         
             
          
              </tr>
               @endforeach

              
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
</div>

      <!-- /.row -->
    </section>
   


@endsection









@section('footer')



@endsection