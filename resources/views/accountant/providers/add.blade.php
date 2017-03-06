@extends('admin.layouts.layout')

@section('title')
أضف مورد
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
              <h3 class="box-title">أضف مورد جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/accountant/providers" , "method"=>"POST" ]) !!}
            @include('accountant.providers.form')
            <input type="submit" name="addprovider" value="اضف مورد" > 

            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




