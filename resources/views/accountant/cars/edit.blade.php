@extends('admin.layouts.layout')

@section('title')
تعديل 
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		تعديل  بيانات سيارة ذات الرقم
    {{ $car->carNumber.' صاحبة المودل : '.$car->carModel }}      
      </h1>
     
    </section>


 <!-- Main content -->
    <section class="content" style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات سيارة</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($car ,['route'=>['accountant.cars.update',$car->id] , 'method'=>'PATCH']) !!}
            @include('accountant.cars.form')
            {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




