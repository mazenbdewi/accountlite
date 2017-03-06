


<table class="table" style="direction:rtl">


<tr>
<td>{!! Form::text("customerFirstName",null,array('class' => 'form-control' ,'placeholder' => 'الاسم الأول','required'=>''))!!}</td>
<td>{!! Form::text("customerMiddleName",null,array('class' => 'form-control' ,'placeholder' => 'اسم الأب'))!!}</td>
<td>{!! Form::text("customerLastName",null,array('class' => 'form-control' ,'placeholder' => 'الكنية','required'=>''))!!}   </td>
<br />
</tr>
 

<tr>
<td>{!!  Form::tel("customerMobile",null,array('class' => 'form-control' ,'placeholder' => 'الجوال','required'=>''))!!}</td>
<td>{!!  Form::text("customerPhoneJob",null,array('class' => 'form-control' ,'placeholder' =>'هاتف العمل','required'=>''))!!}  </td>
<td>{!!  Form::text("customerPhoneHome",null,array('class' => 'form-control' ,'placeholder' =>'هاتف المنزل'))!!} </td>
</tr>


<tr>
<td>{!!  Form::text("customerAddress",null,array('class' => 'form-control' ,'placeholder' => 'العنوان','required'=>''))!!}</td>
<td>{!!  Form::text("customerCity",null,array('class' => 'form-control' ,'placeholder' => 'المدينة'))!!}</td>
<td>{!!  Form::text("customerNational",null,array('class' => 'form-control' ,'placeholder' => 'الجنسية'))!!}</td>
</tr>
<tr>
<td>
<form class="form-inline">
 	<div class="form-group">
    <div class="input-group">

{!!  Form::number("limit",null,array('class' => 'form-control' ,'placeholder' => 'الحد الإئتماني','required'=>''))!!}
 <div class="input-group-addon" style="background-color:#eee;border-top-width: 1px;border-top-style: solid;    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-left-color: rgb(204, 204, 204);
    border-left-style: solid;
    border-left-width: 1px;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;">ليرة</div>
    </div>
  </div>
  </form>
</td>
</tr>

</table>


