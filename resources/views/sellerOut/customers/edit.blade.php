@extends('admin.layouts.layout')

@section('title')
تعديل زبون
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		تعديل  زبون
    {{ $customer->customerFirstName.' '.$customer->customerLastName }}      
      </h1>
     
    </section>


 <!-- Main content -->
    <section class="content" style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل زبون</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($customer ,['route'=>['sellerOut.customers.update',$customer->id] , 'method'=>'PATCH']) !!}
            @include('sellerOut.customers.form')
            {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




