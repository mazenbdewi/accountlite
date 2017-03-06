@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

@endsection


@section('header')
 
 

@endsection


@section('content')



 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">جدول السندات</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  {!! Form::open(['Route'=>'admin.accounts.index','method'=>'GET','class'=>'Class_name']) !!}

                  <input type="text" name="id" id="id" placeholder="ادخل رقم الفاتورة">
                   <input type="text" name="orderDate" id="orderDate" placeholder="ادخل تاريخ الفاتورة">
                 
                  {!! Form::Submit()!!}

                  {!! Form::close()!!}
                  <tr>
                    <th>رقم السند</th>
                    <th>تاريخ السند</th>
                    <th>استحقاق السند</th>
                    <th>نوع السند</th>
                    <th>تفاصيل</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($orders as $order)
                  <tr>
                    <td><span >{{$order->id+450}}</span></td>
                    <td><span  >{{$order->orderDate}}</span></td>
                    <td><span >{{$order->orderDueDate}}</span></td>
                    <td><span ><?php  if($order->orderType=='sandin') echo 'سند قبض' ;
                                      elseif($order->orderType=='sandout') echo 'سند دفع';
                                      


                                ?></span></td>
                     <td> <a href="/adminpanel/accounts/{{$order->id}}" target="_blank" class="btn btn-default"> الفاتورة </a></td>
                  </tr>
                 
                   @endforeach     

                             {!! $orders->links() !!} 

                              
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
                
      

@endsection









@section('footer')





@endsection
