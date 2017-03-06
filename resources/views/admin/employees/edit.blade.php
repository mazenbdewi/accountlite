@extends('admin.layouts.layout')

@section('title')
تعديل موظف
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		تعديل الموظف 
    {{ $employee->employeeFirstName.' '.$employee->employeeLastName }}      
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li ><a href="{{ url('/adminpanel/employees')}}">التحكم بالموظفين </a></li>
        <li class="active"><a href="{{ url('/adminpanel/employees/'.$employee->id.'/edit')}}">تعديل موظف </a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل موظف</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($employee ,['route'=>['adminpanel.employees.update',$employee->id] , 'method'=>'PATCH']) !!}
            @include('admin.employees.form')
            {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




