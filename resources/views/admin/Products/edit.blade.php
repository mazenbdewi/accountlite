@extends('admin.layouts.layout')

@section('title')
تعديل المادة
@endsection


@section('header')


@endsection




@section('content')


 <!-- Main content -->
    <section class="content" style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل المادة </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($product ,['route'=>['adminpanel.products.update',$product->id] , 'method'=>'PATCH']) !!}
            @include('admin.products.form')
            {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




