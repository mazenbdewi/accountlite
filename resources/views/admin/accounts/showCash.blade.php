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
           <table>
              {!! Form::open(['Route'=>'admin.accounts.showCash','method'=>'GET','class'=>'Class_name']) !!}
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
        <div class="panel-heading">حركة الصندوق</div>
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

@foreach($showCashs as $showCash)
<tr>

<td> {{ $showCash->id }}</td>
<td>{{$showCash->orderDate}}</td>
<td> <?php  if($showCash->orderType=='sell') echo 'فاتورة بيع' ;
                                      elseif($showCash->orderType=='buy') echo 'فاتورة شراء';
                                      elseif($showCash->orderType=='rebuy') echo 'فاتورة مرتجع مشتريات';
                                      elseif($showCash->orderType=='resell') echo 'فاتورة مرتج مبيعات';
                                      elseif($showCash->orderType=='sandout') echo 'سند دفع';
                                      elseif($showCash->orderType=='sandin') echo 'سند قبض';


                        ?>

                    @if($showCash->fromto == 'rent') <span>الأجار </span>
                    @elseif($showCash->fromto == 'goods') <span>بضاعة </span>
                    @elseif($showCash->fromto == 'tranc') <span>نقل </span>
                    @elseif($showCash->fromto == 'electric') <span>فاتورة الكهرباء</span>
                    @elseif($showCash->fromto == 'salary') <span>الراتب </span>
                    @elseif($showCash->fromto == 'overtime') <span>ساعات عمل إضافية </span>
                    @elseif($showCash->fromto == 'rentSalary') <span>سلفة على الراتب </span>
                    @elseif($showCash->fromto == 'oil') <span>وقود </span>
                    @elseif($showCash->fromto == 'water') <span>فاتورة المياه </span>
                    @elseif($showCash->fromto == 'fix') <span>صيانة </span>
                    @elseif($showCash->fromto == 'help') <span>تعويضات </span>
                    @elseif($showCash->fromto == 'travel') <span>بدل سفر </span>
                    @elseif($showCash->fromto == 'tranc') <span>بدل نقل </span>
                    @elseif($showCash->fromto == 'oilemployee')<span>بدل وقود </span>
                    @elseif($showCash->fromto == 'fromhome') <span>بدل سكن </span>
                    @elseif($showCash->fromto == 'fromfood')<span>بدل طعام </span>
                    @elseif($showCash->fromto == 'returngoods') <span>مرتجع بضاعة </span>
                    @elseif($showCash->fromto == 'other') <span>{{$showCash->orderNote}}</span>
                    @endif

                    @if($showCash->orderNote == 'cashOpen') <span>سند  افتتاحي صندوق </span>
                    @elseif($showCash->orderNote == 'bankOpen') <span>سند افتتاحي البنك</span>
                    @elseif($showCash->orderNote == 'firstgoods') <span>بضاعة أول المدة</span>
                    @elseif($showCash->orderNote == 'lastgoods') <span>بضاعة آخر المدة</span>
                    @endif

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