


<table class="table" style="direction:rtl">

<tr>
 <td>
 {!! Form::select('category_id', $categories, null,array('placeholder' => 'نوع المادة','class' => 'form-control','required'=>'')) !!}

  </td> <br/>
 </tr>

 <tr>

 <td> {!!  Form::text("productCode",null, array('class' => 'form-control' ,'placeholder' => 'رقم المادة','required'=>''))!!} </td> 
 <td>{!!  Form::text("productName",null, array('class' => 'form-control' ,'placeholder' => ' اسم المادة','required'=>''))!!}</td>
 <td> {!!  Form::text("productDescription",null, array('class' => 'form-control' ,'placeholder' => 'وصف المادة'))!!} </td><br />
</tr>
 
 <tr>

<td>{!!  Form::text("productNetPrice",null, array('class' => 'form-control' ,'placeholder' => 'السعر الصافي','required'=>''))!!}</td>
<td>{!!  Form::text("productQuntity",null, array('class' => 'form-control' ,'placeholder' => 'الكمية ','required'=>''))!!}</td>
<td> {!!  Form::text("productUnit",null, array('class' => 'form-control' ,'placeholder' => ' وحدة القياس','required'=>''))!!}</td>
<td>{!!  Form::text("productSellPrice",null, array('class' => 'form-control' ,'placeholder' => 'سعر المبيع','required'=>''))!!}</td>
</tr>
<tr>
<td>{!!  Form::text("productTotalPrice",null, array('class' => 'form-control' ,'placeholder' => ' سعر الكمية الإجمالية ','required'=>''))!!}</td>

<td>{!!  Form::text("allQuantity",null, array('class' => 'form-control' ,'placeholder' => 'حجم المستودع من المادة','required'=>''))!!}</td>
</tr>

</table>


