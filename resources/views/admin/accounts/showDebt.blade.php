@extends('admin.layouts.layout')

@section('title')

حركة الديون
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
           <table>
              {!! Form::open(['Route'=>'admin.accounts.showDebt','method'=>'GET','class'=>'Class_name']) !!}
              <tr>
               
                <td><input type="date" name="orderDate" id="orderDate" class="form-control" ></td>
               <td>.................</td>
                 <td>  {!! Form::submit("الحركة حسب التاريخ" , ["class"=>"btn btn-info"]) !!} </td>

                  {!! Form::close()!!}
              </tr>
            </table>
           
            <!-- /.box-header -->
            <div class="box-body">
<div class="panel panel-info ">
        <div class="panel-heading">حركة الديون</div>
         <div class="panel-body">

<table class="table table-striped" style="direction:rtl">




<tr>
	
	<th> ID الحركة </th>
  <th>التاريخ</th>
	<th>البيان</th>
	<th>الوارد</th>
	<th>الصادر</th>

</tr>
<?php 
$totalGetMoney = 0 ;
$orderOutPaymen = 0 ;
 ?>

@foreach($showDebts as $showDebt)
<tr>

<td> {{ $showDebt->id }}</td>
<td>{{$showDebt->orderDate}}</td>
<td> <?php  if($showDebt->orderType=='sell') echo 'فاتورة بيع' ;
                                      elseif($showDebt->orderType=='buy') echo 'فاتورة شراء';
                                      elseif($showDebt->orderType=='rebuy') echo 'فاتورة مرتجع مشتريات';
                                      elseif($showDebt->orderType=='resell') echo 'فاتورة مرتج مبيعات';
                                      elseif($showDebt->orderType=='sandout') echo 'سند دفع';
                                      elseif($showDebt->orderType=='sandin') echo 'سند قبض';


                        ?>

                    @if($showDebt->fromto == 'rent') <span>الأجار </span>
                    @elseif($showDebt->fromto == 'goods') <span>بضاعة </span>
                    @elseif($showDebt->fromto == 'tranc') <span>نقل </span>
                    @elseif($showDebt->fromto == 'electric') <span>فاتورة الكهرباء</span>
                    @elseif($showDebt->fromto == 'salary') <span>الراتب </span>
                    @elseif($showDebt->fromto == 'overtime') <span>ساعات عمل إضافية </span>
                    @elseif($showDebt->fromto == 'rentSalary') <span>سلفة على الراتب </span>
                    @elseif($showDebt->fromto == 'oil') <span>وقود </span>
                    @elseif($showDebt->fromto == 'water') <span>فاتورة المياه </span>
                    @elseif($showDebt->fromto == 'fix') <span>صيانة </span>
                    @elseif($showDebt->fromto == 'help') <span>تعويضات </span>
                    @elseif($showDebt->fromto == 'travel') <span>بدل سفر </span>
                    @elseif($showDebt->fromto == 'tranc') <span>بدل نقل </span>
                    @elseif($showDebt->fromto == 'oilemployee')<span>بدل وقود </span>
                    @elseif($showDebt->fromto == 'fromhome') <span>بدل سكن </span>
                    @elseif($showDebt->fromto == 'fromfood')<span>بدل طعام </span>
                    @elseif($showDebt->fromto == 'returngoods') <span>مرتجع بضاعة </span>
                    @elseif($showDebt->fromto == 'other') <span>{{$showDebt->orderNote}}</span>
                    @endif

                    @if($showDebt->orderNote == 'cashOpen') <span>سند  افتتاحي صندوق </span>
                    @elseif($showDebt->orderNote == 'bankOpen') <span>سند افتتاحي البنك</span>
                    @elseif($showDebt->orderNote == 'firstgoods') <span>بضاعة أول المدة</span>
                    @elseif($showDebt->orderNote == 'lastgoods') <span>بضاعة آخر المدة</span>
                    @endif

</td>
<td>{{number_format($showDebt->getMoney,2)}}</td>
<td>{{number_format($showDebt->orderOutPayment,2)}}</td>


<?php $totalGetMoney+= $showDebt->backMoney;
      $orderOutPaymen+=$showDebt->orderOutPayment;
    ?>

 @endforeach
</tr>   
<tr>
    <th>المجموع</th>
	<th>  </th>
	<th></th>
	<th><?php echo number_format(($totalGetMoney),2) ; ?></th>
	<th><?php echo number_format($orderOutPaymen,2) ; ?></th>
</tr>

<tr>

	<th>في الصندوق </th>
		<?php  $total=$totalGetMoney - $orderOutPaymen ;  ?>
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