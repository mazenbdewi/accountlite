@extends('admin.layouts.layout')


@section('title')

سند صرف
@endsection


@section('header')


@endsection


   

@section('content')

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

 <script type="text/javascript" src="/js/js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js
"></script>
   
    <script type="text/javascript">
    $(function () {

         $("#orderBankName").hide();
        $("#orderCheckNO").hide(); 

        $("#orderType").change(function () {
            if ($(this).val() == "outlay") {
                $("#orderOutPayment").show();
            } else {
                $("#orderOutPayment").hide();
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

         $("#choseOne").change(function () {

            
             if ($(this).val() == "employee") {
                $("#employee").show();
                $("#provider").hide();
              
            } else {
                $("#employee").hide();
                $("#provider").show();
                
            }
        });
    });

    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
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

 
#orderBankName,#orderCheckNO,#employee,#provider{
display: none ;

}
.currencyinput {
    border: 1px inset #ccc;
}
.currencyinput input {
    border: 0;
}

</style>

 <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            <div class="panel panel-danger">
            <div class="panel-heading">
<table>
<tr>

<td>رقم المعرف :</td>
<td>
@foreach($catch as $catchs)
{{($catchs->id)+1}}
@endforeach
</td>
<td>    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
</td>

<td>سند صرف</td>
</tr>
</table>
    </div>

<div>@foreach($catch as $catchs)
  <a href='/adminpanel/inv/{{$catchs->id}}' target="_blank"><span class="glyphicon glyphicon-print"></span></a> 
@endforeach 
</div>

            <div class="panel-body">
  {!! Form::open(["url"=>"/adminpanel/accounts" , "method"=>"POST" ]) !!}

<table  table class="table table-striped " style="direction:rtl">

<input type="hidden" id="orderType" name="orderType" value="sandout"  >    
    

	<tr>

	<th style="text-align:center"><span>صرفنا إلى السيد :</span></th>
  <td><select id='choseOne'  class="form-control">
    <option value=''>اختر</option>
    <option value='provider'>مورد</option>
    <option value='employee'>موظف</option>
  </select></td>
  <td>
    {!!  Form::select("employee_id",$employee,null,array('id'=>'employee','class'=>'form-control','placeholder'=>'اسم الموظف'))!!} </td>
	 <td>
    {!!  Form::select("provider_id",$provider,null,array('id'=>'provider','class'=>'form-control','placeholder'=>'اسم المورد'))!!} </td>
	</tr>

<tr>
 
 <td>في تاريخ </td>
  <td>{!!  Form::date("orderDate",null,array('required'=>'','class'=>'form-control'))!!}</td>

 </tr>
 <tr>
 
 <td>
 
 
 <input type="text" id="orderOutPayment"  name="orderOutPayment" class="form-control"  placeholder="المبلغ" required oninvalid="this.setCustomValidity('من فضلك أدخل المبلغ')" oninput="setCustomValidity('')">
 </td>
 </tr>
 <tr>
 <td>
 <select name="fromto" class="form-control" required>
   <option value="">من أجل</option>
   <option value="rent">اجار</option>
   <option value="goods">بضاعة</option>
   <option value="tranc">اجار نقل</option>
   <option value="electric">فاتورة كهرباء</option>
   <option value="salary">راتب </option>
   <option value="overtime">اضافي </option>
   <option value="rentSalary">سلفة على الراتب</option>
   <option value="oil">وقود</option>
   <option value="water">فاتورة ماء</option>
   <option value="fix">صيانة</option>
   <option value="help">تعويضات</option>
   <option value="travel">بدل سفر</option>
   <option value="tranc">أجار نقل عمال</option>
   <option value="oilemployee">بدل وقود</option>
   <option value="fromhome">بدل سكن</option>
   <option value="fromfood">بدل طعام</option>
 </select>
 </td>
 <tr>
	
    <td><select type="select" id="orderPaymentType" name="orderPaymentType" class="form-control" required oninvalid="this.setCustomValidity('من فضلك أدخل نوع الدفع')" oninput="setCustomValidity('')">
    <option value=""> نوع الدفع</option>
    <option value="cash">الصندوق</option>
    <option value="bank">اجل</option>
    </select>

    </td>
	
</tr>

<tr>
	
	<td><input type="text" id="orderBankName" name="orderBankName" class="form-control" placeholder="اسم البنك"></td>
	<td><input type="text" id="orderCheckNO" name="orderCheckNO" class="form-control" placeholder="رقم الشيك"></td>   
    
   
</tr>
<tr><td><input type="text" id="orderNote" name="orderNote" placeholder="ملاحظات" class="form-control"></td></tr>

<tr style="text-align:right">

 <?php
               $employeeName = Auth::user()->name;
        echo '<th>الموظف : </th>';
    echo "<td><span><input type='text' name='employeeName'  value='$employeeName' class='form-control' readonly /></span></td>" ;
 ?>
 </tr>
 
 
 <tr>
  <td> <input type="submit" name="addsand" class="btn btn-info" value="حفظ" > </td>
  </tr>
            {!! Form::close() !!}
 
</table>

</div>
</div>
</div>
</div>
</div>
</div>

</section>
 

  <!-- Modal Structure -->


</div>

    


@endsection









@section('footer')


{!! Html::script('/js/js/materialize.min.js') !!}

@endsection
