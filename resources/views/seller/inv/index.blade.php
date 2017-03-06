@extends('admin.layouts.layout')


@section('title')

جدول الفواتير 

@endsection


@section('header')
 
 

@endsection





@section('content')


 <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            <div class="panel panel-primary ">
            <div class="panel-heading">

جدول الفواتير 

    </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            <section>
              <table>
              {!! Form::open(['Route'=>'seller.inv.index','method'=>'GET','class'=>'Class_name']) !!}
              <td>............................................................................</td>
                   <td><input type="text" name="id" id="id" class="form-control" placeholder=" الفاتورة ID "></td>
                    <td>.......................</td>
                   <td><input type="text" name="orderDate" id="orderDate" class="form-control" placeholder="ادخل تاريخ الفاتورة"></td>
                    <td>..........................................................................</td>
                
                   {!! Form::submit("بحث" , ["class"=>"btn btn-info"]) !!}

                  {!! Form::close()!!}
            </table>
            </section>
            <section>
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>              
                  <tr>
                    <th >ID</th>
                    <th>تاريخ الفاتورة</th>
                    <th>استحقاق الفاتورة</th>
                    <th>نوع الفاتورة</th>
                    <th>تفاصيل الفاتورة</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($orders as $order)
                  <tr>
                    <td width="10%"><span >{{$order->id}}</span></td>
                    <td width="15%"><span  >{{$order->orderDate}}</span></td>
                    <td width="15%"><span >{{$order->orderDueDate}}</span></td>
                    <td width="15%"><span ><?php  if($order->orderType=='sell') echo 'بيع' ;
                                      elseif($order->orderType=='buy') echo 'شراء';
                                      elseif($order->orderType=='rebuy') echo 'مرتجع مشتريات';
                                      elseif($order->orderType=='resell') echo 'مرتجع مبيعات';
                                       elseif($order->orderType=='sandout') echo 'سند دفع';
                                       elseif($order->orderType=='sandin') echo 'سند قبض';

                                ?></span></td>
                     <td width="15%"> <a href="/seller/inv/{{$order->id}}" target="_blank" class="btn btn-default"> الفاتورة </a></td>
                 


                </tr>


                 
                   @endforeach  
                 
                   
                 <div class="pagination">
                       {!! $orders->links() !!}  
                 
                  </div>
                
                     
                  </tbody>
                </table>
              </div>
              </section>
              <!-- /.table-responsive -->
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>
                
      

@endsection









@section('footer')





@endsection
