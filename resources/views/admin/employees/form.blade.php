
<table class="table table-striped "  style="direction:rtl">

<tr>
 <td>
 {!! Form::select('career_id', $careers,null,array('class' => 'form-control' ,'placeholder' => 'الرتبة الوظيفية','required'=>'')) !!}
 

  </td> <br/>
 </tr>

 <tr>
 

 <td> {!!  Form::text("employeeFirstName",null, array('class' => 'form-control' ,'placeholder' => 'الاسم الاول','required'=>''))!!} </td> 
 <td>{!!  Form::text("employeeMiddleName",null,array('class' => 'form-control' ,'placeholder' => 'اسم الأب'))!!}</td>
 <td> {!!  Form::text("employeeLastName",null,array('class' => 'form-control' ,'placeholder' => 'الكنية','required'=>''))!!} </td>
 <td> تاريخ الميلاد </td>
 <td>{!!  Form::date("employeeBrithday",null,['class'=>'form-control','required'=>''])!!}</td>

 <br />
</tr>

<tr>
<td>{!!  Form::text("employeeMobile",null,array('class' => 'form-control' ,'placeholder' => 'الجوال','required'=>''))!!}</td>
<td>{!!  Form::text("employeePhoneHome",null,array('class' => 'form-control' ,'placeholder' => 'هاتف المنزل','required'=>''))!!}</td>
<td>{!!  Form::text("employeePhoneJob",null,array('class' => 'form-control' ,'placeholder' => 'هاتف العمل'))!!}</td>
<td>  تاريخ العمل  </td>
 <td>{!!  Form::date("employeeFrom",null,['class'=>'form-control','required'=>''])!!}</td>
</tr>
<tr>
<td>{!!  Form::text("employeeAddress",null,array('class' => 'form-control' ,'placeholder' => 'العنوان','required'=>''))!!}</td>
<td>{!!  Form::text("employeeCity",null,array('class' => 'form-control' ,'placeholder' => 'المدينة'))!!}</td>
<td>{!!  Form::text("employeeNational",null,array('class' => 'form-control' ,'placeholder' => 'الجنسية'))!!}</td>
<td> تاريخ ترك العمل</td>
<td> {!!  Form::date("employeeTo",null,['class'=>'form-control'])!!}</td>

</tr>

<tr>

 <td>
 <form class="form-inline">
 	<div class="form-group">
    <div class="input-group">
      {!!  Form::number("employeeSalary",null,array('class' => 'form-control' ,'placeholder' => 'الراتب','required'=>''))!!}
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


