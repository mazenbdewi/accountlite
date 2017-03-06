@extends('admin.layouts.layout')

@section('title')
أضف موظف
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
              <h3 class="box-title">أضف موظف جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/adminpanel/employees" , "method"=>"POST" ]) !!}
            @include('admin.employees.form')
            {!! Form::submit("اضف " , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




