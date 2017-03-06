
  
<script type="text/javascript">
$(function(){

     $('#productTotalPrice').on('click',function(){
     
      var netPrice = $('#netPrice').val();
      var quantity = $('#quantity').val();
      var m = (netPrice*quantity)  ;
      $('#productTotalPrice').val(m) ;
    });
});

</script>


<table class="table" style="direction:rtl">

<tr>
<th>نوع المادة</th>
 <td>
 {!! Form::select('category_id', $categories, null,array('placeholder' => 'نوع المادة','class' => 'form-control','required'=>'')) !!}

  </td> <br/>
 </tr>

 <tr>
<th>رقم المادة</th>
 <td> {!!  Form::text("productCode",null, array('class' => 'form-control' ,'placeholder' => 'رقم المادة','required'=>''))!!} </td> 
 <th>الاسم</th>
 <td>{!!  Form::text("productName",null, array('class' => 'form-control' ,'placeholder' => ' اسم المادة','required'=>''))!!}</td>
<th>الوحدة</th>
<td> {!!  Form::text("productUnit",null, array('class' => 'form-control' ,'placeholder' => ' وحدة القياس','required'=>''))!!}</td>
<th>الكمية</th>
<td>{!!  Form::text("productQuntity",null, array('id'=>'quantity','class' => ' form-control' ,'placeholder' => 'الكمية ','required'=>''))!!}</td>
<th>حجم المستودع من المادة</th>
<td>{!!  Form::text("allQuantity",null, array('class' => 'form-control' ,'placeholder' => 'حجم المستودع من المادة','required'=>''))!!}</td>
</tr>
 
<tr>
<th>السعر الصافي </th>
<td>{!!  Form::text("productNetPrice",null, array('id'=>'netPrice','class' => 'form-control' ,'placeholder' => 'السعر الصافي','required'=>''))!!}</td>
<th>القيمة التقديرية</th>
<td>
<input type="text" id="productTotalPrice" name="productTotalPrice" class="form-control" placeholder='سعر كل البضاعة' >
</td>
<th>سعر آخر شراء</th>
<td>{!!  Form::text("productLastPrice",null, array('class' => 'form-control' ,'placeholder' => 'سعر آخر شراء','readonly'))!!}</td>
<th>سعر الجملة</th>
<td>{!!  Form::text("productNetSell",null, array('class' => 'form-control' ,'placeholder' => 'سعر مبيع جملة','required'=>''))!!}</td>
<th>سعر المبيع</th>
<td>{!!  Form::text("productSellPrice",null, array('class' => 'form-control' ,'placeholder' => 'سعر المبيع','required'=>''))!!}</td>


</tr>
<table>
<tr>

 <th>الوصف</th>
 <td><input type='note' class='form-control' name='productDescription' placeholder='وصف المادة' style='width:400px'></td>
</div>
</tr>
</table>

</table>


