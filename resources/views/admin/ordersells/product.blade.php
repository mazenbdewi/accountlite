@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')
<div class="container">
		  رقم الطلبية <h1>{{$order->orderCode}} </h1>

		  <table class="table">
		  {!! Form::open(["url"=>"adminpanel/ordersells/product"])!!}
		  {!! Form::hidden("order_id",$order->id)!!}
		  <tr>
		  		<td>ادخل اسم المادة</td>
		  		<td>{!! Form::text("productName")!!}</td>
		  		<td>{!! Form::submit("Add",["class"=>"btn btn-info"])!!}</td>
		  </tr>



		  </table>


	<table class="table">

	<tr>

			<th>ID</th>
			<th>المادة</th>
			<th>السعر</th>
			<th>العدد</th>
			<th>الوحدة</th>
			<th>المجموع</th>
			<th></th>
			<th></th>
	</tr>

	<?php $i=1; ?>

	<?php $products=$array_of_products[$i] ; ?>

	@foreach($products as $product)

	<tr>
		<td></td>
		<td>{{$product->productName}}</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	@endforeach
	<?php $i=$i+1 ; ?>


	</table>
</div>


@endsection



@section('footer')
@endsection
