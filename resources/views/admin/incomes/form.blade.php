
<table class="table table-bordered table-hover " >
<tr>
<script>

$(document).ready(function(){
    $('#salary').change(function(){
        if(this.selected)
            $('#autoUpdate').fadeIn('slow');
        else
            $('#autoUpdate').fadeOut('slow');

    });
});
</script>
<th>نوع الحساب </th> 

<td>
{!! Form::select('accountName',array('salary'=>'الراتب'))!!}
 </td>

 
 

<td>{{$totals}}</td>
    
    

<tr>
	<th>رقم السند</th>
	<th> تاريخ السند </th>
	<th> قيمة السند </th>
</tr>
<tr>

 <td> </td>
 
 <td>{!!  Form::date("accountDate")!!}</td>
  <td>{!!  Form::text("accountSum")!!}</td>

 </tr>
 </tr>
 <tr>
<tr>
	
	<th>رقم الشيك </th>
	<th> تاريخ الشيك </th>
	<th>النوع</th>
</tr>
<tr>
	<td>{!!  Form::text("checNo")!!}</td>
    <td>{!!  Form::date("checkDate")!!}</td>
    <td>{!! Form::select('bankName',array('cash'=>'كاش','bank'=>'بنك'))!!}</td>

</tr>
<tr>
<th>ملاحظات </th>
 
 </tr>
 
 
<tr>
<td>{!!  Form::text("accountNote")!!}</td>
</tr>



</table>


