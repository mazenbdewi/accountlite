@extends('admin.layouts.layout')

@section('title')
تعديل مورد
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
              <h3 class="box-title">تعديل المورد {{$provider->providerFirstName}} {{$provider->providerLastName}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($provider ,['route'=>['user.providers.update',$provider->id] , 'method'=>'PATCH']) !!}
            @include('user.providers.form')
            {!! Form::submit("تعديل مورد" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




