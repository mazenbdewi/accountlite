
@extends('admin.layouts.layout')

@section('title')
سند قبض
@endsection


@section('header')


@endsection




@section('content')


<script type="text/javascript">
    $(function () {
       
         $("#orderPaymentType").change(function () {

            
             if ($(this).val() == "bank") {
                $("#orderBankName").show();
                $("#orderCheckNO").show();
            } else {
                $("#orderBankName").hide();
                $("#orderCheckNO").hide();
            }
        });
         
    });
</script>
<style type="text/css">
.form-style-9{
    max-width: 450px;
    background: #FAFAFA;
    padding: 30px;
    margin: 50px auto;
    box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
    border-radius: 10px;
    border: 6px solid #305A72;
}
.form-style-9 ul{
    padding:0;
    margin:0;
    list-style:none;
}
.form-style-9 ul li{
    display: block;
    margin-bottom: 10px;
    min-height: 35px;
}
.form-style-9 ul li  .field-style{
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    padding: 8px;
    outline: none;
    border: 1px solid #B0CFE0;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;

}.form-style-9 ul li  .field-style:focus{
    box-shadow: 0 0 5px #B0CFE0;
    border:1px solid #B0CFE0;
}
.form-style-9 ul li .field-split{
    width: 49%;
}
.form-style-9 ul li .field-full{
    width: 100%;
}
.form-style-9 ul li input.align-left{
    float:left;
}
.form-style-9 ul li input.align-right{
    float:right;
}
.form-style-9 ul li textarea{
    width: 100%;
    height: 100px;
}
.form-style-9 ul li input[type="button"], 
.form-style-9 ul li input[type="submit"] {
    -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
    -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
    box-shadow: inset 0px 1px 0px 0px #3985B1;
    background-color: #216288;
    border: 1px solid #17445E;
    display: inline-block;
    cursor: pointer;
    color: #FFFFFF;
    padding: 8px 18px;
    text-decoration: none;
    font: 12px Arial, Helvetica, sans-serif;
}
.form-style-9 ul li input[type="button"]:hover, 
.form-style-9 ul li input[type="submit"]:hover {
    background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
    background-color: #28739E;
}

 
#orderBankName,#orderCheckNO{
display: none ;

}
</style>
 

 

 <!-- Main content -->
    <section class="content" >
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body" style="direction:rtl">
             <div class="panel panel-primary">
        <div class="panel-heading">

<table>
<tr>

<td>رقم المعرف :</td>
<td>
@foreach($catch2 as $catchs2)
{{($catchs2->id)+1}}
@endforeach
</td>
<td>    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
</td>

<td>سند قبض</td>
</tr>
</table>

</div>
<div>
        @foreach($catch2 as $catchs2)
         <a href='/user/inv/{{$catchs2->id}}' target="_blank"><span class="glyphicon glyphicon-print"></span></a> 
        @endforeach 
</div>

         <div class="panel-body">
            {!! Form::open(["url"=>"/user/catchDocuments" , "method"=>"POST" ]) !!}

<table class="table table-striped " >
<tr>


    
<input type="hidden" name="orderType" id="orderType" value="sandget"> 
  
</tr>

	<tr>
	<td>استلمنا من السيد :</td>
    <td>
    {!!  Form::select("customer_id",$customer,null,array('class'=>'form-control','placeholder'=>'اسم الزبون','required'=>''))!!}

	</td>
	</tr>

<tr>
 
 <td>في تاريخ</td>
 <td> 
 <input type="date" name="orderDate" class="form-control" required oninvalid="this.setCustomValidity('من فضلك أدخل التاريخ')" oninput="setCustomValidity('')">
  </td>
 </tr>
 <tr>
 
 <td><input type="text" name="getMoney" class="form-control" placeholder="المبلغ" required oninvalid="this.setCustomValidity('من فضلك أدخل المبلغ المدفوع')" oninput="setCustomValidity('')" ></td>
 
 <td><input type="text" name="backMoney" class="form-control" placeholder="الباقي" required oninvalid="this.setCustomValidity('من فضلك أدخل الباقي')" oninput="setCustomValidity('')"></td>
 
 </tr>

 <tr>
	

<td>
    <select name="orderPaymentType" id="orderPaymentType" class="form-control" required oninvalid="this.setCustomValidity('من فضلك حدد نوع الدفع')" oninput="setCustomValidity('')">
    <option value="">طريق الدفع</option>
    <option value="bank" >البنك</option>
    <option value="cash">الصندوق</option>
    </select>
</td>

</tr>
<tr>
	<td>{!! Form::text("orderBankName",null,array('id'=>'orderBankName','class'=>'form-control','placeholder'=>'اسم البنك'))!!}</td>

	<td>{!! Form::text("orderCheckNO",null,array('id'=>'orderCheckNO','class'=>'form-control','placeholder'=>'رقم الشيك'))!!}</td>  
</tr>

<tr>
<td><input type="note" name="orderNote" placeholder="ملاحظات" class='form-control'></td>
</tr>

<tr style="text-align:right">

 <?php
               $employeeName = Auth::user()->name;
        echo '<th>الموظف : </th>';
        echo '<td>'.$employeeName.'</td>' ;
 ?>
 </tr>
 
</table>
 {!! Form::submit("حفظ" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

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
