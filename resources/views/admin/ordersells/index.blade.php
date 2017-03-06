@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')
 
  <div class="box-body">
                <div class="container">
 

                        <div class="panel=body">
                             
                            {!! Form::open(["url"=>"/adminpanel/ordersells" , "Method"=>"POST" ]) !!}


                            <table class="table" >

                            <tr>
                              <td> نوع الطلبية</td> <td> {!! Form::text("orderType") !!} </td>
                            </tr>
                            <tr>
                              <td> رقم الفاتورة </td> <td> {!!  Form::text("orderCode",null)!!} </td>
                              <td> تاريخ الفاتورة </td> <td> {!!  Form::date("orderDate",null)!!} </td>
                            </tr>
                            <tr>
                            <!-- <td> اسم المندوب </td> <td> {!!  Form::text("employeeFirstName",null)!!} </td> -->
                              <td> شركة الشحن</td> <td>{!!  Form::text("orderShipperName")!!}</td>
                              <td> تاريخ الشحن </td><td> {!!  Form::date("orderShipperDate")!!} </td>
                            <td> سعر الشحن </td><td> {!!  Form::text("orderShipperPrice")!!} </td>
                            </tr>
                            <tr>

                            <td> تاريخ استحقاق الدفع </td><td>{!!  Form::date("orderDuDate")!!}</td>
                             <td>  نوع الدفع </td><td>{!!  Form::text("orderPaymentType")!!}</td>
                             <td> قيمة الحسم</td><td> {!!  Form::text("orderDiscount")!!}</td>
                             <!-- <td> المستودع</td><td> {!!  Form::text("productWarehouse")!!}</td> -->

                             <td>{!! Form::text("productName")!!}</td>
                             </tr>
                             <tr>
                             
                              <td> <input type="submit" name="addProduct" value="addProduct"></td>
                             <td> <input type="submit" name="addorder" value="addorder"></td>
                                        {!! Form::close() !!}
                            </tr>
                            </div>

                            


                            </td>
                            </tr>
                            </table>
                        </div>


                        @if($orders !=null)

                              <table class="table">
                                          <tr>
                                             <th>رقم الطبية </th>
                                             <th>تاريخ الطلبية</th>
                                             <th>اسم الزبون</th>
                                             <th> </th>
                                             <th></th>
                                          </tr>

                                          

                                          @foreach($orders as $order)

                                        <tr>          
                                   {!! Form::open(["url"=>"/adminpanel/ordersells/$order->id" , "method"=>"PATCH" ]) !!}

                                          <td> {!! Form::text("orderCode",$order->orderCode) !!}  </td>
                                          <td> {!! Form::text("orderDate",$order->orderDate) !!}  </td>
                                          <td> {!! Form::text("orderCode",$order->orderCode) !!}  </td>
                                          <td>     {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!} </td>
                                   {!! Form::close() !!}

                                           <td>  
                                                                  
                                    {!! Form::open(["url"=>"/adminpanel/ordersells/$order->id" , "method"=>"delete" ]) !!}
                                                           
                                    {!! Form::submit("حذف" , ["class"=>"btn btn-danger"]) !!} 

                                     {!! Form::close() !!}

                                     </td>
                                     <td> <a href="/adminpanel/ordersells/{{$order->id}}" class="btn btn-default"> إضافة مواد </a></td>
                                                                                     
                                      </tr>

                                  @endforeach

                                    </table>
                             
                           @endif

               


                </div>
  </div>



@endsection






@section('footer')
@endsection