@extends('admin.layouts.layout')

@section('title')
أضف مادة
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
              <h3 class="box-title">أضف مادة جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/user/products" , "method"=>"POST" ]) !!}

            @include('admin.products.form')
            {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




