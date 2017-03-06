<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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



<div class="form-style-9">


<table  table class="table table-striped " style="direction:rtl">

<input type="hidden" id="orderType" name="orderType" value="sandout"  >    
    








	<tr>
	

	<th style="text-align:center"><span>صرفنا إلى السيد :</span></th>
	 <td>{!!  Form::select("provider_id",$provider)!!}</td>
	</tr>

<tr>
 
 
  <td>{!!  Form::date("orderDate")!!}</td>

 </tr>
 <tr>
 
 <td>
 <input type="text" id="orderOutPayment" name="orderOutPayment" placeholder="المبلغ">
 </td>
 
 
 <td>{!!  Form::select("fromto",array('selected'=>'من أجل','rent'=>'اجار','goods'=>'بضاعة','tranc'=>'نقل','electric'=>'كهرباء','salary'=>'راتب','overtime'=>'مكافأة','rentSalary'=>'سلفة على الراتب','oil'=>'وقود سيارة'))!!}</td>
</tr>
 <tr>
	
    <td><select type="select" id="orderPaymentType" name="orderPaymentType">
    <option selected="selected"> نوع الدفع</option>
    <option value="cash">الصندوق</option>
    <option value="bank">البنك</option>
    </select>

    </td>
	
</tr>

<tr>
	
	<td><input type="text" id="orderBankName" name="orderBankName" placeholder="اسم البنك"></td>
	<td><input type="text" id="orderCheckNO" name="orderCheckNO" placeholder="رقم الشيك"></td>   
    
   
</tr>
<tr><td><input type="text" id="orderNote" name="orderNote" placeholder="ملاحظات"></td></tr>
<tr>
<th>الموظف </th>
<td>{!!  Form::select("employee_id",$employee)!!}</td>
 
 </tr>
 
</table>

</div>
