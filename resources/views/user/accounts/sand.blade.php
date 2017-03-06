@extends('admin.layouts.layout')

@section('title')
أضف سند
@endsection


@section('header')


@endsection




@section('content')
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
</style>
 <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">إضافة قيود يومية</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/adminpanel/accounts/sand" , "method"=>"POST" ]) !!}




      {!! Html::script('/sand/jquery.min.js') !!}

<style type="text/css">
 
#orderBankName,#orderCheckNO,#orderOutPayment,#orderPayment,#fromto,#fromto2,#fromto3 {
display: none
}
 
</style>


<script type="text/javascript">
    $(function () {
        $("#typeFromto").change(function () {
            if ($(this).val() == "outlay") {
                $("#orderOutPayment").show();
                 $("#fromto").show();
                 $("#fromto2").hide();
                $("#orderPayment").hide();
            } else {
                $("#orderOutPayment").hide();
                 $("#fromto").hide();
                 $("#fromto2").show();
                $("#orderPayment").show();
            }
        });
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

<div  class="form-style-9" >

<table class="table table-striped "  style="direction:rtl">

<tr>
<input type="hidden" name="orderType" id="orderType" value="qaed"> 
</tr>
<tr>

<td><select type="select" id="typeFromto" name="typeFromto" class="form-control"  >
        <option selected="selected" > اختر نوع</option>
        <option  value="income"> مداخيل </option>
        <option  value="outlay"> مصاريف </option>
         
         
     </select>


</td>

<div >

</div>


<tr>
 
 
  <td>{!!  Form::date("orderDate")!!}</td>

 </tr>
 <tr>
 
 <td>
     <input type="text" id="orderOutPayment" name="orderOutPayment" placeholder="المبلغ" class="form-control">
     <input type="text" id="orderPayment"    name="orderPayment"    placeholder="المبلغ" class="form-control">

    <select id="fromto" name="fromto"  class="form-control bg-red">
    <option value="rent">اجار</option>
    <option value="goods">بضاعة</option>
    <option value="tranc">نقل</option>
    <option value="electric">كهرباء</option>
    <option value="oil">وقود سيارة</option>
   
    </select>

    <select id="fromto2" name="fromto"  class="form-control bg-green ">
    <option value="rent">اسهم</option>
    
    
    </select>

 </td>


 
 <tr>
	
    <td><select type="select" id="orderPaymentType" name="orderPaymentType" class="form-control">
    <option selected="selected"> نوع الدفع</option>
    <option value="cash">الصندوق</option>
    <option value="bank">البنك</option>
    </select>

    </td>
	
</tr>

<tr>
	
	<td><input type="text" id="orderBankName" name="orderBankName" placeholder="اسم البنك" class="form-control">
	<input type="text" id="orderCheckNO" name="orderCheckNO" placeholder="رقم الشيك" class="form-control"></td>   
    
   
</tr>
<tr><td><input type="text" id="orderNote" name="orderNote" placeholder="ملاحظات" class="form-control"></td></tr>

 
</table>


{!! Form::submit("حفظ" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




