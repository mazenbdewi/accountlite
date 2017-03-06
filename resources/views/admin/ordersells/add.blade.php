@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')
 
  <div class="box-body"  style="direction:rtl">
                <div class="container">
 

                        <div class="panel=body">
                             


                            <table class="table" >
                            {!! Form::open(["url"=>"/adminpanel/ordersells" , "Method"=>"POST" ]) !!}

                            <tr>
                              <td> نوع الطلبية</td> <td> {!! Form::select("orderType",array('sell'=>"بيع") )!!} </td>
                            </tr>
                            <tr>
                              <td> رقم الفاتورة </td> <td> {!!  Form::text("id",null)!!} </td>
                              <td> تاريخ الفاتورة </td> <td> {!!  Form::date("orderDate",null)!!} </td>

                             <td>الزبون{!! Form::select('customer_id', $customers, null, ['class' => 'form-control']) !!}</td>
                            </tr>
                            <tr>
                              <td> شركة الشحن</td> <td>{!!  Form::text("orderShipperName")!!}</td>
                              <td> تاريخ الشحن </td><td> {!!  Form::date("orderShipperDate")!!} </td>
                            <td> سعر الشحن </td><td> {!!  Form::text("orderShipperPrice")!!} </td>
                            </tr>
                            <tr>

                            
                             <td>  نوع الدفع </td><td>{!!  Form::select("orderPaymentType",array('cash'=>'كاش','card'=>'كريدت كارت','tom'=>'آجل'))!!}</td>
                             <td> قيمة الحسم %</td><td> {!!  Form::text("orderDiscount")!!}</td>
                             <tr>
                             <td> الموظف </td> 
                             <td>{!! Form::select('employee_id', $employees, null, ['class' => 'form-control']) !!}</td>
                            </tr>
                             <tr>
                              <td>{!! Form::submit("Add",["class"=>"btn btn-info"])!!}</td>
                              </tr>
                             </tr>
                             {!! Form::close() !!}
                             <tr>
                             
                             

                                        
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

                                          <td> {!! Form::text("id",$order->id) !!}  </td>
                                          <td> {!! Form::text("orderDate",$order->orderDate) !!}  </td>
                                          <td>     {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!} </td>
                                   {!! Form::close() !!}

                                           <td>  
                                                                  
                                   <td>
 
                          <a class="btn btn-danger" href="{{url('/adminpanel/ordersells/'.$order->id.'/delete')}}"> حذف</a></td>
                                  </td>

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