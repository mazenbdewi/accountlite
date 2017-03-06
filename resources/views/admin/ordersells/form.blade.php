@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')
 
 
{!! Form::open(["url"=>"/adminpanel/ordersells/form" , "Method"=>"POST" ]) !!}


<table class="table"  style="direction:rtl">

<tr>
  <td> نوع الطلبية</td>

  <td> {!! Form::text("orderType") !!} </td>
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
 </tr>
 <tr>
  <td> ملاحظات </td> <td>{!!  Form::text("orderNote")!!}</td>
<td> {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!} </td>
            {!! Form::close() !!}



<td> <a href="/adminpanel/ordersells/sell"> Next </a></td>


</td>
</tr>
</table>

@if($orders !=null)

                                    <table class="table">
                                              <tr>
                                                    <th><h3>رقم الطبية </h3></th>

                                                    <th><h3>تاريخ الطلبية</h3></th>

                                                    <th><h3>الحذف</h3></th>
                                              </tr>
                                               @foreach($orders as $order)

                                              <tr>




                                                  {!! Form::open(["url"=>"/adminpanel/categories/$category->id" , "method"=>"PATCH" ]) !!}

                                                   <td> {!! Form::text("categoryName",$category->categoryName) !!}  </td>
                                                   <td>     {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!} </td>
                                                  {!! Form::close() !!}

                                                       <td>


                                                   {!! Form::open(["url"=>"/adminpanel/categories/$category->id" , "method"=>"delete" ]) !!}

                                               
                                                   {!! Form::submit("حذف" , ["class"=>"btn btn-danger"]) !!}
                                                   {!! Form::close() !!}

                                                        </td>
                   
                                               </tr>

                                                @endforeach
                                    </table>
                                 @endif




@endsection



@section('footer')
@endsection