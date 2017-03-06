@extends('admin.layouts.layout')

@section('title')

حركة الصندوق مدين
@endsection


@section('header')


@endsection




@section('content')



<table class="table table-bordered table-hover " style="direction:rtl">


<tr>
<td>الصندوق</td>
<td>{{$cashNow}}</td>
</tr>


<tr>
	<th>حساب</th>
	<th>التاريخ</th>
	<th>مدين</th>
	<th>دائن</th>

</tr>
<?php $sumin=0 ; ?>
@foreach($showCash as $showCashs)
<tr>
<td>{{$showCashs->accountName}}</td>
<td>{{$showCashs->accountDate}}</td>
<td>{{$showCashs->accountSub}}</td>
<td>{{$showCashs->accountSum}}</td>

<?php $sumin+=$showCashs->accountSum ; ?>

 @endforeach
</tr>   
<tr>
<td> </td>
<td> مجموع المصاريف</td>
<td >{{$sum}}</td>
<td>{{$sumin}}</td>
</tr>




</table>


@endsection



@section('footer')
@endsection