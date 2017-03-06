@extends('admin.layouts.layout')

@section('title')

حركة الصندوق مدين
@endsection


@section('header')
<style type="text/css">
  tr{text-align:center;}
  td{text-align:center;}
  th{text-align:center;}


</style>


@endsection




@section('content')

<section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
<div class="panel panel-info ">
        <div class="panel-heading">حركة الصندوق</div>
         <div class="panel-body">

<table class="table table-striped" style="direction:rtl">




<tr>
	<th>التاريخ</th>
	<th> ID الفاتورة </th>
	<th>البيان</th>
	<th>الوارد</th>
	<th>الصادر</th>

</tr>
<?php 
$totalGetMoney = 0 ;
$orderOutPaymen = 0 ;
 ?>

 @foreach($accountCash as $accountCashs)
  <tr>
  <td></td>
  <td></td>
  <td>الرصيد الافتتاحي للصندوق</td>
 <td>{{number_format($accountCashs->cash,2)}}</td>
 <?php  $openCash= $accountCashs->cash;  ?> 
 </tr>
 @endforeach
@foreach($showCashs as $showCash)
<tr>
<td>{{$showCash->orderDate}}</td>
<td> {{ $showCash->id }}</td>
<td> <?php  if($showCash->orderType=='sell') echo 'فاتورة بيع' ;
                                      elseif($showCash->orderType=='buy') echo 'فاتورة شراء';
                                      elseif($showCash->orderType=='rebuy') echo 'فاتورة مرتجع مشتريات';
                                      elseif($showCash->orderType=='resell') echo 'فاتورة مرتج مبيعات';
                                      elseif($showCash->orderType=='sandout') echo 'سند دفع';
                                      elseif($showCash->orderType=='sandin') echo 'سند قبض';


                        ?>

</td>
<td>{{number_format($showCash->getMoney,2)}}</td>
<td>{{number_format($showCash->orderOutPayment,2)}}</td>


<?php $totalGetMoney+= $showCash->getMoney;
      $orderOutPaymen+=$showCash->orderOutPayment;
    ?>

 @endforeach
</tr>   
<tr>
    <th>المجموع</th>
	<th>  </th>
	<th></th>
	<th><?php echo number_format(($totalGetMoney+$openCash),2) ; ?></th>
	<th><?php echo number_format($orderOutPaymen,2) ; ?></th>
</tr>

<tr>

	<th>في الصندوق </th>
		<?php  $total=$totalGetMoney+$openCash - $orderOutPaymen ;  ?>
	<?php if ($total>0) 
			 echo "<th class='form-control bg-green' >".number_format($total,2)."</th>" ;

	  else  
		echo "<th class='form-control bg-red'>".number_format($total,2) ."</th>" ;

?>
	 
</tr>
	
	


</tr>


</table>
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